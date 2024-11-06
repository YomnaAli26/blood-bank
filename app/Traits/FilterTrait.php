<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Schema;

trait FilterTrait
{
    public function scopeFilter(Builder $builder, array $filters): Builder
    {
        foreach ($filters as $field => $value) {
            if ($this->isFillable($field) || $this->hasColumn($field)) {
                if (!empty($value)) {
                    if (is_array($value)) {
                        $builder->whereIn($field, $value);
                    }
                    $builder->where($field, '=', "$value");
                }
            }
        }
        return $builder;
    }

    private function hasColumn($column): bool
    {
        return Schema::hasColumn($this->getTable, $column);
    }
}
