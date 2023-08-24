<?php

namespace App\Models;

use App\Filters\Customer_addressFilters;
use Essa\APIToolKit\Filters\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Customer_address extends Model
{
    use HasFactory, Filterable, SoftDeletes;

    protected string $default_filters = Customer_addressFilters::class;

    /**
     * Mass-assignable attributes.
     *
     * @var array
     */
    protected $fillable = [
        'customer_id',
        'address_id',
    ];

    public function foodOrder(): BelongsTo
    {
        return $this->belongsTo(Food_order::class);
    }
    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }
    public function address(): BelongsTo
    {
        return $this->belongsTo(Address::class);
    }

}
