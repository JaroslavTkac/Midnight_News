<?php
/**
 * Created by PhpStorm.
 * User: jaroslavtkaciuk
 * Date: 10/02/2017
 * Time: 16:30
 */

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Admin
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     *
     * @throws \Illuminate\Auth\AuthenticationException
     */
    public function handle($request, Closure $next)
    {
        if (!Auth::check()){
            return redirect('/login');
        }
        if (!Auth::user()->isAdmin()) {
            return redirect('/');
        }
        return $next($request);
    }


}