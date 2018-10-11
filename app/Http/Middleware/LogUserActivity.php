<?php

namespace App\Http\Middleware;

use Closure;

use Carbon\Carbon;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Cache;

class LogUserActivity
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
        if (Auth::check()){
            $expies_at = Carbon::now()->addMinutes(5);

            Cache::put('user-online-' .Auth::user()->id, true, $expies_at);

            Auth::user()->update(['updated_at' => $expies_at]);
            
        }
        return $next($request);
    }
}
