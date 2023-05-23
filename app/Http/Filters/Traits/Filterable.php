<?php

namespace App\Http\Filters\Traits;

use App\Http\Filters\FilterInterface;
use Illuminate\Database\Eloquent\Builder;

trait Filterable
{
    public function scopeFilter(Builder $builder,FilterInterface $filter) {
        $filter->apply($builder);
        return $builder;
    }
}
