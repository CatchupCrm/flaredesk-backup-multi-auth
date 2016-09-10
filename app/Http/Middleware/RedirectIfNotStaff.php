<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfNotStaff
{
  /**
   * Handle an incoming request.
   *
   * @param  \Illuminate\Http\Request $request
   * @param  \Closure $next
   * @param  string|null $guard
   * @return mixed
   */
  public function handle($request, Closure $next, $guard = 'staff')
  {

    echo "RedirectIfNotStaff file RedirectIfNotStaff LINE 20";
    dd(Auth::guard($guard));
/*
    if (!Auth::guard($guard)->check()) {
      return redirect('staffloginnostaff');
    }*/
    return $next($request);
  }
}