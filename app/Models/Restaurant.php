<?php

namespace App\Models;

use App\Filters\RestaurantFilters;
use Essa\APIToolKit\Filters\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Restaurant extends Model
{
    use HasFactory, Filterable, SoftDeletes;

    protected string $default_filters = RestaurantFilters::class;

    /**
     * Mass-assignable attributes.
     *
     * @var array
     */
    protected $fillable = [
        'restaurant_name',
        'address_id',
    ];

    public function order_menu_item()  : HasMany
    {  
        return $this->hasMany(Order_menu_item::class);
    }  

    public function address(): BelongsTo
    {
        return $this->belongsTo(Address::class);
    }

}
