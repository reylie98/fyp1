<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Session;

class isCS
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
        if ($request->user() && $request->user()->admin != 2)
        {
            return redirect()->action('AdminController@logout')->with('flash_message_error','invalid Username or Password');
        }

		return $next($request);
    }
}
