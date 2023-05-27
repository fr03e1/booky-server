<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;

abstract class AbstractFilter implements FilterInterface
{
    private $queryParams = [];

    public function __construct(array $queryParams)
    {
        $this->queryParams = $queryParams;
    }

    abstract protected function getCallBacks(): array;

    public function apply(Builder $builder)
    {
        foreach ($this->getCallBacks() as $name => $callBack) {
            if(isset($this->queryParams[$name])) {
                call_user_func($callBack,$builder,$this->queryParams[$name]);
            }
        }
    }

}
