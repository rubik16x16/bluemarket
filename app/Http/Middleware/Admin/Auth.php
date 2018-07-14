<?php

namespace App\Http\Middleware\Admin;

use Closure;

class Auth{
  /**
   * Handle an incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \Closure  $next
   * @return mixed
   */
  public function handle($request, Closure $next){

    if(!$request->session()->has('admin')){
      return redirect(route('admin.login.get'));
    }

    return $next($request);
  }
}
