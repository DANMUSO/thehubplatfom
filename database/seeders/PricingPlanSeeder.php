<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PricingPlan;

class PricingPlanSeeder extends Seeder
{
    public function run()
    {
        $plans = [
            // Vehicles
            ['vehicles', 'free', 'Basic Listing', 'Perfect for selling personal vehicles', 0, 0, ['3 ads/month', '5 photos', '30 days'], 3, 5, 30],
            ['vehicles', 'basic', 'Enhanced Visibility', 'Get more views for your vehicles', 149, 1430, ['10 ads/month', '15 photos', '45 days', 'Priority'], 10, 15, 45],
            ['vehicles', 'premium', 'Featured Vehicles', 'Maximum exposure for dealers', 299, 2870, ['Unlimited ads', '25 photos', '60 days', 'Featured'], null, 25, 60],
            
            // Real Estate
            ['realestate', 'free', 'Basic Listing', 'Perfect for individual property owners', 0, 0, ['2 ads/month', '8 photos', '45 days'], 2, 8, 45],
            ['realestate', 'basic', 'Enhanced Visibility', 'Ideal for landlords & sellers', 199, 1910, ['8 ads/month', '20 photos', '60 days', 'Priority'], 8, 20, 60],
            ['realestate', 'premium', 'Agent & Developer', 'Maximum exposure for professionals', 499, 4790, ['Unlimited ads', '30 photos', '90 days', 'Featured'], null, 30, 90],
            
            // Others
            ['others', 'free', 'Basic Listing', 'Perfect for getting started', 0, 0, ['5 ads/month', '5 photos', '30 days'], 5, 5, 30],
            ['others', 'basic', 'Enhanced Visibility', 'Get more views with priority listing', 99, 950, ['15 ads/month', '10 photos', '45 days'], 15, 10, 45],
            ['others', 'premium', 'Featured Ad Posting', 'Stand out with featured placement', 199, 1910, ['Unlimited ads', '15 photos', '60 days', 'Featured'], null, 15, 60],
            ['others', 'business', 'Enterprise Solution', 'Maximum exposure for your business', 399, 3830, ['Unlimited ads', '20 photos', '90 days', 'Premium'], null, 20, 90],
        ];

        foreach ($plans as $p) {
            PricingPlan::create([
                'category' => $p[0],
                'plan_type' => $p[1],
                'name' => $p[2],
                'description' => $p[3],
                'monthly_price' => $p[4],
                'yearly_price' => $p[5],
                'features' => $p[6],
                'ads_limit' => $p[7],
                'photos_limit' => $p[8],
                'listing_days' => $p[9],
            ]);
        }
    }
}