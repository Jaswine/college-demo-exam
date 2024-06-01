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
        Schema::create('product_users', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('product_id')->constraint('products')->onDelete('cascade');
            // $table->foreignId('user_id')->constraint('users')->onDelete('cascade');
            $table->unsignedBiginteger('product_id')->unsigned();
            $table->unsignedBiginteger('user_id')->unsigned();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_users');
    }
};
