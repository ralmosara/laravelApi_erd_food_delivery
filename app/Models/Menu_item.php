<?php

namespace App\Models;

use App\Filters\Menu_itemFilters;
use Essa\APIToolKit\Filters\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Menu_item extends Model
{
    use HasFactory, Filterable, SoftDeletes;

    protected string $default_filters = Menu_itemFilters::class;

    /**
     * Mass-assignable attributes.
     *
     * @var array
     */
    protected $fillable = [
        'restaurant_id',
        'item_name',
        'price',
    ];

    public function restaurant(): BelongsTo
    {
        return $this->belongsTo(Restaurant::class);
    }

    public function order_menu_item()  : HasMany
    {  
        return $this->hasMany(Order_menu_item::class);
    }  



}
