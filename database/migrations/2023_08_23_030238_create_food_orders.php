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
        Schema::create('food_orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('restaurant_id');
            $table->unsignedBigInteger('customer_address_id');
            $table->unsignedBigInteger('order_status_id');
            $table->unsignedBigInteger('assigened_driver_id');
            $table->dateTime('order_datetime', $precision = 0);
            $table->decimal('delivery_fee', $precision = 18, $scale = 2);
            $table->decimal('total_amount', $precision = 18, $scale = 2);
            $table->dateTime('requested_delivery_datetime', $precision = 0);
            $table->integer('cust_driver_rating');
            $table->integer('cust_restaurant_rating');
            $table->softDeletes();
            $table->timestamps();


            
            $table->foreign('customer_id')
            ->references('id')->on('customers')->onDelete('cascade');
            $table->foreign('restaurant_id')
            ->references('id')->on('restaurants')->onDelete('cascade');
            $table->foreign('customer_address_id')
            ->references('id')->on('customer_addresses')->onDelete('cascade');    
            $table->foreign('order_status_id')
            ->references('id')->on('order_statuses')->onDelete('cascade');   
            $table->foreign('assigened_driver_id')
            ->references('id')->on('delivery_drivers')->onDelete('cascade');   
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('food_orders');
    }
};
