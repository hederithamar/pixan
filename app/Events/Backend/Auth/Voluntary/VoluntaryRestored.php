<?php

namespace App\Events\Backend\Auth\Voluntary;

use Illuminate\Queue\SerializesModels;

/**
 * Class VoluntaryRestored.
 */
class VoluntaryRestored
{
    use SerializesModels;

    /**
     * @var
     */
    public $voluntary;

    /**
     * @param $voluntary
     */
    public function __construct($voluntary)
    {
        $this->voluntary = $voluntary;
    }
}
