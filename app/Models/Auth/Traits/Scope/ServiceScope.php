<?php

namespace App\Models\Auth\Traits\Scope;

/**
 * Class ServiceScope.
 */
trait ServiceScope
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
