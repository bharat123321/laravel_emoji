<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Cache;
use Carbon\Carbon;
class Online_Offline 
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
        if(Auth::check()){
            $ex_result = Carbon::now()->addMinute(1);
            Cache::put('user-is-online'.Auth::user()->id , true , $ex_result);
        }
        return $next($request);
    }
}
