<?php

namespace App\Plugins\Other\PasswordWebsite;

use Closure;

class Middleware
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
        if (sc_config('PasswordWebsite_mode') && request()->route()->getName() != 'passwordwebsite.index') {
            if (empty(session('password_website'))) {
                return redirect()->guest(sc_route('passwordwebsite.index'));
            }
        }
        return $next($request);
    }
}
