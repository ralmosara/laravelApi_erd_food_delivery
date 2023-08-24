<?php

namespace App\Filters;

use Essa\APIToolKit\Filters\QueryFilters;

class RestaurantFilters extends QueryFilters
{
    protected array $allowedFilters = [];

    protected array $columnSearch = [];
}
