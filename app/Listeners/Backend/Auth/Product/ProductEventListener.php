<?php

namespace App\Listeners\Backend\Auth\Product;

/**
 * Class ProductEventListener.
 */
class ProductEventListener
{
    /**
     * @param $event
     */
    public function onCreated($event)
    {
        \Log::info('Product Created');
    }

    /**
     * @param $event
     */
    public function onUpdated($event)
    {
        \Log::info('Product Updated');
    }

    /**
     * @param $event
     */
    public function onDeleted($event)
    {
        \Log::info('Product Deleted');
    }

    /**
     * @param $event
     */
    public function onPermanentlyDeleted($event)
    {
        \Log::info('Product Permanently Deleted');
    }

    /**
     * @param $event
     */
    public function onRestored($event)
    {
        \Log::info('Product Restored');
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param \Illuminate\Events\Dispatcher $events
     */
    public function subscribe($events)
    {
        $events->listen(
            \App\Events\Backend\Auth\Product\ProductCreated::class,
            'App\Listeners\Backend\Auth\Product\ProductEventListener@onCreated'
        );

        $events->listen(
            \App\Events\Backend\Auth\Product\ProductUpdated::class,
            'App\Listeners\Backend\Auth\Product\ProductEventListener@onUpdated'
        );

        $events->listen(
            \App\Events\Backend\Auth\Product\ProductDeleted::class,
            'App\Listeners\Backend\Auth\Product\ProductEventListener@onDeleted'
        );


        $events->listen(
            \App\Events\Backend\Auth\Product\ProductPermanentlyDeleted::class,
            'App\Listeners\Backend\Auth\Product\ProductEventListener@onPermanentlyDeleted'
        );

        $events->listen(
            \App\Events\Backend\Auth\Product\ProductRestored::class,
            'App\Listeners\Backend\Auth\Product\ProductEventListener@onRestored'
        );
    }
}
