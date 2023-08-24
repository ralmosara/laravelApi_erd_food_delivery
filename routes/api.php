<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;


Route::post('/login', [LoginController::class, 'login']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/logout', [LoginController::class, 'logout']);

    Route::apiResource('/food_orders', \App\Http\Controllers\API\Food_orderController::class);
    Route::group([
    'prefix' => 'food_orders',
    ], function() {
        Route::get('{id}/restore', [\App\Http\Controllers\API\Food_orderController::class, 'restore']);
        Route::delete('{id}/permanent-delete', [\App\Http\Controllers\API\Food_orderController::class, 'permanentDelete']);
    });

    Route::apiResource('/menu_items', \App\Http\Controllers\API\Menu_itemController::class);
    Route::group([
    'prefix' => 'menu_items',
    ], function() {
        Route::get('{id}/restore', [\App\Http\Controllers\API\Menu_itemController::class, 'restore']);
        Route::delete('{id}/permanent-delete', [\App\Http\Controllers\API\Menu_itemController::class, 'permanentDelete']);
    });


    Route::apiResource('/restaurants', \App\Http\Controllers\API\RestaurantController::class);
    Route::group([
    'prefix' => 'restaurants',
    ], function() {
        Route::get('{id}/restore', [\App\Http\Controllers\API\RestaurantController::class, 'restore']);
        Route::delete('{id}/permanent-delete', [\App\Http\Controllers\API\RestaurantController::class, 'permanentDelete']);
    });


    Route::apiResource('/addresses', \App\Http\Controllers\API\AddressController::class);
    Route::group([
    'prefix' => 'addresses',
    ], function() {
        Route::get('{id}/restore', [\App\Http\Controllers\API\AddressController::class, 'restore']);
        Route::delete('{id}/permanent-delete', [\App\Http\Controllers\API\AddressController::class, 'permanentDelete']);
    });


    Route::apiResource('/countries', \App\Http\Controllers\API\CountryController::class);
    Route::group([
    'prefix' => 'countries',
    ], function() {
        Route::get('{id}/restore', [\App\Http\Controllers\API\CountryController::class, 'restore']);
        Route::delete('{id}/permanent-delete', [\App\Http\Controllers\API\CountryController::class, 'permanentDelete']);
    });
  

    Route::apiResource('/customer_addresses', \App\Http\Controllers\API\Customer_addressController::class);
    Route::group([
    'prefix' => 'customer_addresses',
    ], function() {
        Route::get('{id}/restore', [\App\Http\Controllers\API\Customer_addressController::class, 'restore']);
        Route::delete('{id}/permanent-delete', [\App\Http\Controllers\API\Customer_addressController::class, 'permanentDelete']);
    });
   

    Route::apiResource('/order_menu_items', \App\Http\Controllers\API\Order_menu_itemController::class);
    Route::group([
    'prefix' => 'order_menu_items',
    ], function() {
        Route::get('{id}/restore', [\App\Http\Controllers\API\Order_menu_itemController::class, 'restore']);
        Route::delete('{id}/permanent-delete', [\App\Http\Controllers\API\Order_menu_itemController::class, 'permanentDelete']);
    });


    Route::apiResource('/order_statuses', \App\Http\Controllers\API\Order_statusController::class);
    Route::group([
    'prefix' => 'order_statuses',
        ], function() {
            Route::get('{id}/restore', [\App\Http\Controllers\API\Order_statusController::class, 'restore']);
            Route::delete('{id}/permanent-delete', [\App\Http\Controllers\API\Order_statusController::class, 'permanentDelete']);
        });


    Route::apiResource('/delivery_drivers', \App\Http\Controllers\API\Delivery_driverController::class);
    Route::group([
    'prefix' => 'delivery_drivers',
    ], function() {
        Route::get('{id}/restore', [\App\Http\Controllers\API\Delivery_driverController::class, 'restore']);
        Route::delete('{id}/permanent-delete', [\App\Http\Controllers\API\Delivery_driverController::class, 'permanentDelete']);
    });


    Route::apiResource('/customers', \App\Http\Controllers\API\CustomerController::class);
    Route::group([
    'prefix' => 'customers',
    ], function() {
        Route::get('{id}/restore', [\App\Http\Controllers\API\CustomerController::class, 'restore']);
        Route::delete('{id}/permanent-delete', [\App\Http\Controllers\API\CustomerController::class, 'permanentDelete']);
    });

});

