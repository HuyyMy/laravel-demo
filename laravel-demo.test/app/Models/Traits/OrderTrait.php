<?php

namespace App\Models\Traits;

use Illuminate\Database\Eloquent\Builder;

trait OrderTrait
{
    /**
     * @param Builder $builder
     *
     * @return $this
     */
    public function scopeCreateAcs(Builder $builder)
    {
        return $builder->orderBy('created_at', 'asc');
    }

    /**
     * @param Builder $builder
     *
     * @return $this
     */
    public function scopeCreateDesc(Builder $builder)
    {
        return $builder->orderBy('created_at', 'desc');
    }

    /**
     * @param Builder $builder
     *
     * @return $this
     */
    public function scopeUpdateAsc(Builder $builder)
    {
        return $builder->orderBy('updated_at', 'asc');
    }

    /**
     * @param Builder $builder
     *
     * @return $this
     */
    public function scopeUpdateDesc(Builder $builder)
    {
        return $builder->orderBy('updated_at', 'Desc');
    }

    /**
     * @param Builder $builder
     *
     * @return $this
     */
    public function scopeOrderAsc(Builder $builder)
    {
        return $builder->orderBy('order', 'asc');
    }

    /**
     * @param Builder $builder
     *
     * @return $this
     */
    public function scopeOrderDesc(Builder $builder)
    {
        return $builder->orderBy('order', 'Desc');
    }
}
