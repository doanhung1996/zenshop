<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Session\Store;
use Session;

class Filter
{
    private $session;

    public function __construct(Store $session)
    {
        $this->session = $session;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $product = $this->getViewedProduct();

        if (!is_null($product))
        {
            $product = $this->cleanExpiredViews($product);
            $this->storePosts($product);
        }

        return $next($request);
    }

    private function getViewedProduct()
    {
        return $this->session->get('viewed_products', null);
    }

    private function cleanExpiredViews($product)
    {
        $time = time();

        // Let the views expire after one hour.
        $throttleTime = 3600;

        return array_filter($product, function ($timestamp) use ($time, $throttleTime)
        {
            return ($timestamp + $throttleTime) > $time;
        });
    }

    private function storePosts($product)
    {
        $this->session->put('viewed_products', $product);
    }
}
