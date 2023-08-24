<?php

namespace App\Models;

use App\Filters\Food_orderFilters;
use Essa\APIToolKit\Filters\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Food_order extends Model
{
    use HasFactory, Filterable, SoftDeletes;

    protected string $default_filters = Food_orderFilters::class;

    /**
     * Mass-assignable attributes.
     *
     * @var array
     */
    protected $fillable = [
        'customer_id',
        'restaurant_id',
        'customer_address_id',
        'order_status_id',
        'assigned_driver_id',
        'order_datetime',
        'delivery_fee',
        'total_amount',
        'requested_delivery_datetime',
        'cust_dirver_rating',
        'cust_restaurant_rating'
    ];

    public function customer() : HasOne
    {
        return $this->hasOne(Customer::class);
    }

    public function restaurant() : HasOne
    {
        return $this->hasOne(Restaurant::class);
    }
    
    public function customer_address() : HasOne
    {
        return $this->hasOne(Customer_address::class);
    }
    
    public function order_status() : HasOne
    {
        return $this->hasOne(Order_status::class);
    }

    public function assigned_driver() : HasOne
    {
        return $this->hasOne(Delivery_driver::class);
    }

    
}
