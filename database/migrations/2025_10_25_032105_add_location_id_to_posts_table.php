<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            // Add location_id as foreign key
            $table->foreignId('location_id')->nullable()->constrained()->onDelete('set null');
            
            // Optional: If you want to remove the old 'location' text field
            // $table->dropColumn('location');
        });
    }

    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropForeign(['location_id']);
            $table->dropColumn('location_id');
            
            // If you dropped the location column, restore it
            // $table->string('location')->nullable();
        });
    }
};