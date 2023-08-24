<?php

namespace App\Models;

use App\Filters\Delivery_driverFilters;
use Essa\APIToolKit\Filters\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Delivery_driver extends Model
{
    use HasFactory, Filterable, SoftDeletes;

    protected string $default_filters = Delivery_driverFilters::class;

    /**
     * Mass-assignable attributes.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
    ];

    public function assigned_driver_id(): BelongsTo
    {
        return $this->belongsTo(customer_address::class);
    }

}
