<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Add phone number field (nullable, in case existing users don't have it)
            $table->string('phone', 20)->nullable()->after('email');
            
            // Add phone verification timestamp (null = not verified, timestamp = verified)
            $table->timestamp('phone_verified_at')->nullable()->after('phone');
            
            // Optional: Add index for faster lookups
            $table->index('phone');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropIndex(['phone']);
            $table->dropColumn(['phone', 'phone_verified_at']);
        });
    }
};