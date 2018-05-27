<?php

namespace App\Events\Backend\Auth\Voluntary;

use Illuminate\Queue\SerializesModels;

/**
 * Class ServicePermanentlyDeleted.
 */
class VoluntaryPermanentlyDeleted
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
