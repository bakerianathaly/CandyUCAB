<?php

namespace App\Http\Middleware;

use Closure;

class Autenticado
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
      @session_start();
      if($_SESSION != NULL)
        if($_SESSION['Middleware']==true)
          return redirect('/');

        //return redirect('login');
        return $next($request);
    }
}
