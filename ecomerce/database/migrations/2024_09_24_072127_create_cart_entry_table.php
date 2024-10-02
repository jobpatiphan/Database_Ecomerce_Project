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
        Schema::create('cart_entry', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->unsignedBigInteger('product_id'); // This should reference the 'id' column
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->double('total_price'); 
            $table->integer('product_amount');
            $table->integer('size');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Drop the cart_entry table first to avoid foreign key constraint issues
        Schema::dropIfExists('cart_entry');
    }
};
