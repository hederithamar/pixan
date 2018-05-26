<?php

namespace App\Events\Backend\Auth\Voluntary;

use Illuminate\Queue\SerializesModels;

/**
 * Class ServiceUpdated.
 */
class VoluntaryUpdated
{
    use SerializesModels;

    /**
     * @var
     */
    public $voluntary;

    /**
     * @param $product
     */
    public function __construct($voluntary)
    {
        $this->voluntary = $voluntary;
    }
}
