<?php

namespace App\Http\Middleware;

use Closure;

class CacheControl
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);
        $response->header('Cache-Control', 'max-age=36000, public');
        $last_modified=$request->input('last_modified');
        if (!empty($last_modified))
            $response->header('Last-Modified', $last_modified);

        return $response;
    }
}
