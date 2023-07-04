<?php

namespace App\Http\Middleware;

use App\Helpers\ApiBackHelper;
use App\Helpers\JsonHelper;
use Closure;
use Illuminate\Http\Request;

class CheckApiBackAuth
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
        if(!ApiBackHelper::guard()->check()) {
            return JsonHelper::jsonResponseError('Unauthorized | 401 (Token Invalid)');
        }

        return $next($request);
    }
}
