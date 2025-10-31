<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('transaction_id')->unique();
            $table->enum('category', ['vehicles', 'realestate', 'others']);
            $table->enum('plan_type', ['free', 'basic', 'premium', 'business']);
            $table->enum('billing_cycle', ['monthly', 'yearly']);
            $table->decimal('amount', 10, 2);
            $table->enum('status', ['pending', 'completed', 'failed', 'refunded'])->default('pending');
            $table->string('payment_method')->nullable(); // mpesa, card, etc.
            $table->string('mpesa_checkout_id')->nullable();
            $table->string('mpesa_receipt')->nullable();
            $table->timestamp('paid_at')->nullable();
            $table->timestamp('expires_at')->nullable();
            $table->json('metadata')->nullable(); // Store additional payment details
            $table->timestamps();
            
            $table->index(['user_id', 'status']);
            $table->index('transaction_id');
        });

        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('payment_id')->nullable()->constrained()->onDelete('set null');
            $table->enum('category', ['vehicles', 'realestate', 'others']);
            $table->enum('plan_type', ['free', 'basic', 'premium', 'business']);
            $table->enum('billing_cycle', ['monthly', 'yearly']);
            $table->boolean('is_active')->default(true);
            $table->timestamp('started_at');
            $table->timestamp('expires_at');
            $table->timestamp('cancelled_at')->nullable();
            $table->timestamps();
            
            $table->index(['user_id', 'is_active']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('subscriptions');
        Schema::dropIfExists('payments');
    }
};