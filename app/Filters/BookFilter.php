<?php

namespace App\Filters;
use Illuminate\Database\Eloquent\Builder;

class BookFilter extends AbstractFilter
{
    const CATEGORIES = 'categories';
    const AUTHORS = 'authors';
    const PUBLISHERS = 'publishers';
    const PRICE = 'price';
    const YEAR = 'year';

    protected function getCallBacks(): array
    {
        return [
            self::CATEGORIES => [$this, 'categories'],
            self::AUTHORS => [$this,'authors'],
            self::PUBLISHERS => [$this,'publishers'],
            self::YEAR => [$this,'year'],
            self::PRICE => [$this,'price'],
        ];
    }

    protected function categories(Builder $builder, $value): void
    {
        $builder->whereIn('category_id',$value);
    }

    protected function authors(Builder $builder, $value): void
    {
        $builder->whereHas('authors',function ($b) use($value) {
            $b->whereIn('author_id',$value);
        });
    }

    protected function price(Builder $builder, $value): void
    {
        $builder->whereBetween('price',$value);
    }

    protected function publishers(Builder $builder, $value): void
    {
        $builder->whereIn('publisher_id',$value);
    }

    protected function year(Builder $builder, $value): void
    {
        $builder->where('year',$value);
    }
}
