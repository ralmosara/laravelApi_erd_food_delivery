<?php

namespace App\Models;

use App\Filters\AddressFilters;
use Essa\APIToolKit\Filters\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;


class Address extends Model
{
    use HasFactory, Filterable, SoftDeletes;

    protected string $default_filters = AddressFilters::class;

    /**
     * Mass-assignable attributes.
     *
     * @var array
     */
    protected $fillable = [
        'unit_number',
        'street_number',
        'address_line1',
        'address_line2',
        'city',
        'region',
        'postal_code',
        'country_id',
    ];

    public function country() : HasOne
    {
        return $this->hasOne(Country::class);
    }
}
