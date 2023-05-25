<?php

namespace App\Traits;

use App\Http\Filters\FilterInterface;
use Illuminate\Database\Eloquent\Builder;

trait HasFilters
{
    public function scopeFilter(Builder $builder,FilterInterface $filter) {
        $filter->apply($builder);
        return $builder;
    }
}
