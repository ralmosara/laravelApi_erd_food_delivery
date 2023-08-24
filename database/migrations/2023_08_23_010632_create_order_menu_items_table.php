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
        Schema::create('order_menu_items', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('order_id')->unsigned();
            $table->bigInteger('menu_item_id')->unsigned();
            $table->integer('qty_ordered');
            $table->softDeletes();
            $table->timestamps();


            $table->foreign('order_id')
            ->references('id')->on('food_orders')->onDelete('cascade');
            $table->foreign('menu_item_id')
            ->references('id')->on('menu_items')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_menu_items');
    }
};
