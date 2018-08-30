<?php

namespace App\Events\Backend\Auth\Service;

use Illuminate\Queue\SerializesModels;

/**
 * Class ServiceUpdated.
 */
class ServiceUpdated
{
    use SerializesModels;

    /**
     * @var
     */
    public $service;

    /**
     * @param $product
     */
    public function __construct($service)
    {
        $this->service = $service;
    }
}
