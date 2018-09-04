<?php

namespace App\Events\Backend\Auth\Voluntary;

use Illuminate\Queue\SerializesModels;

/**
 * Class ServiceCreated.
 */
class VoluntaryCreated
{
    use SerializesModels;

    /**
     * @var
     */
    public $voluntary;

    /**
     * @param $service
     */
    public function __construct($voluntary)
    {
        $this->voluntary = $voluntary;
    }
}
