<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait HasSort {
    public function scopeWithSorting(Builder $query): Builder
    {
        $column = request()->input('sort_by', 'id');
        $direction = request()->input('sort_direction', 'asc');

        return $query->orderBy($column, $direction);
    }
}
