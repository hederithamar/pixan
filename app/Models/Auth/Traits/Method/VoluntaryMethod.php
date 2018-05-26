<?php

namespace App\Models\Auth\Traits\Method;

/**
 * Trait VoluntaryMethod.
 */
trait VoluntaryMethod
{
   

    /**
     * @param bool $size
     *
     * @return bool|\Illuminate\Contracts\Routing\UrlGenerator|mixed|string
     * @throws \Illuminate\Container\EntryNotFoundException
     */
    public function getPicture($size = false)
    {
        return url('storage/'.$this->user->avatar_location);
    }

    /**
     * @return bool
     */
    public function isActive()
    {
        return $this->active == 1;
    }

    /**
     * @return bool
     */
    public function isConfirmed()
    {
        return $this->confirmed == 1;
    }
    
}