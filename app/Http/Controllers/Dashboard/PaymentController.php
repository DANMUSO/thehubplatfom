<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    public function initiatePayment(Request $request)
    {
        $validated = $request->validate([
            'category' => 'required|in:vehicles,realestate,others',
            'plan_type' => 'required|in:free,basic,premium,business',
            'billing_cycle' => 'required|in:monthly,yearly',
            'payment_method' => 'required|in:mpesa,card',
            'phone_number' => 'required_if:payment_method,mpesa|regex:/^254[0-9]{9}$/',
        ]);

        $amount = Payment::getAmount(
            $validated['category'],
            $validated['plan_type'],
            $validated['billing_cycle']
        );

        // Free plan doesn't require payment
        if ($amount == 0) {
            return $this->createFreeSubscription($validated);
        }

        try {
            DB::beginTransaction();

            $payment = Payment::create([
                'user_id' => auth()->id(),
                'transaction_id' => Payment::generateTransactionId(),
                'category' => $validated['category'],
                'plan_type' => $validated['plan_type'],
                'billing_cycle' => $validated['billing_cycle'],
                'amount' => $amount,
                'payment_method' => $validated['payment_method'],
                'status' => 'pending',
                'expires_at' => now()->addMinutes(10),
            ]);

            // Initiate payment based on method
            if ($validated['payment_method'] === 'mpesa') {
                $response = $this->initiateMpesaPayment($payment, $validated['phone_number']);
            } else {
                $response = $this->initiateCardPayment($payment);
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Payment initiated successfully',
                'payment_id' => $payment->id,
                'transaction_id' => $payment->transaction_id,
                'amount' => $payment->amount,
                'data' => $response,
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Payment initiation failed: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Payment initiation failed. Please try again.',
            ], 500);
        }
    }

    private function initiateMpesaPayment(Payment $payment, string $phoneNumber)
    {
        // M-Pesa STK Push integration
        // Replace with actual M-Pesa API implementation
        
        $checkoutRequestId = 'ws_CO_' . time();
        $payment->update(['mpesa_checkout_id' => $checkoutRequestId]);

        return [
            'checkout_request_id' => $checkoutRequestId,
            'message' => 'Please check your phone for M-Pesa prompt',
        ];
    }

    private function initiateCardPayment(Payment $payment)
    {
        // Card payment gateway integration (e.g., Stripe, Flutterwave)
        // Replace with actual payment gateway implementation
        
        return [
            'payment_url' => route('payment.checkout', $payment->id),
            'message' => 'Redirecting to payment page',
        ];
    }

    public function mpesaCallback(Request $request)
    {
        // M-Pesa callback handler
        Log::info('M-Pesa Callback:', $request->all());

        $resultCode = $request->input('Body.stkCallback.ResultCode');
        $checkoutRequestId = $request->input('Body.stkCallback.CheckoutRequestID');

        $payment = Payment::where('mpesa_checkout_id', $checkoutRequestId)->first();

        if (!$payment) {
            return response()->json(['message' => 'Payment not found'], 404);
        }

        if ($resultCode == 0) {
            // Payment successful
            $receipt = $request->input('Body.stkCallback.CallbackMetadata.Item.0.Value');
            $this->completePayment($payment, $receipt);
        } else {
            // Payment failed
            $payment->markAsFailed();
        }

        return response()->json(['ResultCode' => 0, 'ResultDesc' => 'Accepted']);
    }

    public function completePayment(Payment $payment, string $receipt = null)
    {
        DB::transaction(function () use ($payment, $receipt) {
            $payment->markAsPaid($receipt);

            // Calculate subscription duration
            $duration = $payment->billing_cycle === 'yearly' ? 12 : 1;

            Subscription::create([
                'user_id' => $payment->user_id,
                'payment_id' => $payment->id,
                'category' => $payment->category,
                'plan_type' => $payment->plan_type,
                'billing_cycle' => $payment->billing_cycle,
                'is_active' => true,
                'started_at' => now(),
                'expires_at' => now()->addMonths($duration),
            ]);
        });

        return response()->json([
            'success' => true,
            'message' => 'Payment completed successfully',
        ]);
    }

    private function createFreeSubscription(array $data)
    {
        Subscription::create([
            'user_id' => auth()->id(),
            'category' => $data['category'],
            'plan_type' => 'free',
            'billing_cycle' => $data['billing_cycle'],
            'is_active' => true,
            'started_at' => now(),
            'expires_at' => now()->addMonth(),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Free subscription activated successfully',
        ]);
    }

    public function checkStatus($transactionId)
    {
        $payment = Payment::where('transaction_id', $transactionId)
            ->where('user_id', auth()->id())
            ->first();

        if (!$payment) {
            return response()->json(['message' => 'Payment not found'], 404);
        }

        return response()->json([
            'status' => $payment->status,
            'amount' => $payment->amount,
            'paid_at' => $payment->paid_at,
        ]);
    }

    public function mySubscriptions()
    {
        $subscriptions = Subscription::where('user_id', auth()->id())
            ->with('payment')
            ->latest()
            ->get();

        return response()->json($subscriptions);
    }

    public function cancelSubscription($id)
    {
        $subscription = Subscription::where('id', $id)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        $subscription->cancel();

        return response()->json([
            'success' => true,
            'message' => 'Subscription cancelled successfully',
        ]);
    }
}