<?php

namespace App\Http\Middleware;

use Closure;

class ResponseHeadersMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);
        $content = $response->content();

        return response(gzencode($content, 9))->withHeaders([
            'Access-Control-Allow-Origin' => '*',
            'Access-Control-Allow-Methods'=> '*',
            'Content-Encoding' => 'gzip'
        ]);
    }
}