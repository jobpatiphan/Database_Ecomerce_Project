<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->text('comment');
            $table->integer('star');
            $table->timestamps();
            
            // Add indexes for better performance
            $table->index(['user_id', 'product_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('comments');
    }
}