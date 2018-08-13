<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Session\Store;
use Session;

class FilterPost
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
        $post = $this->getViewedPost();

        if (!is_null($post))
        {
            $post = $this->cleanExpiredViews($post);
            $this->storePosts($post);
        }

        return $next($request);
    }

    private function getViewedPost()
    {
        return $this->session->get('viewed_posts', null);
    }

    private function cleanExpiredViews($post)
    {
        $time = time();

        // Let the views expire after one hour.
        $throttleTime = 3600;

        return array_filter($post, function ($timestamp) use ($time, $throttleTime)
        {
            return ($timestamp + $throttleTime) > $time;
        });
    }

    private function storePosts($post)
    {
        $this->session->put('viewed_posts', $post);
    }
}
