<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('category');
            $table->decimal('price', 10, 2);
            $table->string('county');
            $table->string('location');
            $table->text('description');
            $table->enum('status', ['draft', 'active', 'pending', 'expired'])->default('draft');
            $table->boolean('featured')->default(false);
            $table->integer('views')->default(0);
            $table->integer('inquiries')->default(0);
            $table->json('photos')->nullable();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('posts');
    }
};