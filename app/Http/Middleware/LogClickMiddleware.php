<?php

namespace App\Http\Middleware;

use App\Services\LogClick;
use Closure;
use Illuminate\Http\Request;

class LogClickMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        if ($request->method() == 'GET' && $response->getStatusCode() == 200) {
            LogClick::logLinkClick($request);
        }
        return $response;
    }
}
