<?php

namespace App\Models;

use App\Filters\Order_statusFilters;
use Essa\APIToolKit\Filters\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Order_status extends Model
{
    use HasFactory, Filterable, SoftDeletes;

    protected string $default_filters = Order_statusFilters::class;

    /**
     * Mass-assignable attributes.
     *
     * @var array
     */
    protected $fillable = [
        'status_value'
    ];

    public function order_status(): BelongsTo
    {
        return $this->belongsTo(Food_order::class);
    }


}
