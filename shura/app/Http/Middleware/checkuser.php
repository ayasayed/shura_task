<?php

namespace App\Http\Middleware;

use Closure;

class checkuser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    // to prevent routing to websites page without login(Authentication)
    public function handle($request, Closure $next)
    {
        if($request->session()->get('info') == null){
            return redirect('/');
        }
        return $next($request);

    }
}
