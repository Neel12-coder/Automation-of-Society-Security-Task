<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null) {
        if (Auth::guard($guard)->check()) {
          $role = Auth::user()->role; 
      
          switch ($role) {
            case 'Member':
               return redirect('/dashboard/member');
               break;
            case 'Admin':
               return redirect('/dashboard/society-admin');
               break; 
            case 'Watchman':
               return '/entry-dashboard/entry';
               break;
            default:
               return redirect('/home'); 
               break;
          }
        }
        return $next($request);
      }
    // public function handle($request, Closure $next, $guard = null)
    // {
    //     if (Auth::guard($guard)->check()) {
    //         return redirect(RouteServiceProvider::HOME);
    //     }

    //     return $next($request);
    // }
}
