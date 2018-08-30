<?php

namespace App\Models\Auth\Traits\Scope;

/**
 * Class ProductScope.
 */
trait ProductScope
{
    /**
     * @param $query
     * @param bool $status
     *
     * @return mixed
     */
    public function scopeActive($query, $status = true)
    {
        return $query->where('active', $status);
    }
}
