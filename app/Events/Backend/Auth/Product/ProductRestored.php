<?php

namespace App\Events\Backend\Auth\Product;

use Illuminate\Queue\SerializesModels;

/**
 * Class ProductRestored.
 */
class ProductRestored
{
    use SerializesModels;

    /**
     * @var
     */
    public $product;

    /**
     * @param $product
     */
    public function __construct($product)
    {
        $this->product = $product;
    }
}
