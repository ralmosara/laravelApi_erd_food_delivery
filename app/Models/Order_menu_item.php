<?php

namespace App\Models;

use App\Filters\Order_menu_itemFilters;
use Essa\APIToolKit\Filters\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Order_menu_item extends Model
{
    use HasFactory, Filterable, SoftDeletes;

    protected string $default_filters = Order_menu_itemFilters::class;

    /**
     * Mass-assignable attributes.
     *
     * @var array
     */
    protected $fillable = [
        'order_id',
        'menu_item_id',
        'qty_ordered',
    ];

    public function food_order(): BelongsTo
    {
        return $this->belongsTo(Food_order::class);
    }

    public function menu_item(): BelongsTo
    {
        return $this->belongsTo(Menu_item::class);
    }




}
