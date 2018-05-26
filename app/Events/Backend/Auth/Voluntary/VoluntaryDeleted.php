<?php

namespace App\Events\Backend\Auth\Voluntary;

use Illuminate\Queue\SerializesModels;

/**
 * Class ServiceDeleted.
 */
class VoluntaryDeleted
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
