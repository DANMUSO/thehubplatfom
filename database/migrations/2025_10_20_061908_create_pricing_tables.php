<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // Pricing Plans
        Schema::create('pricing_plans', function (Blueprint $table) {
            $table->id();
            $table->string('category', 50); // vehicles, realestate, others
            $table->string('plan_type', 50); // free, basic, premium, business
            $table->string('name');
            $table->text('description')->nullable();
            $table->decimal('monthly_price', 8, 2);
            $table->decimal('yearly_price', 8, 2);
            $table->json('features');
            $table->integer('ads_limit')->nullable();
            $table->integer('photos_limit');
            $table->integer('listing_days');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->unique(['category', 'plan_type']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('pricing_plans');
    }
};