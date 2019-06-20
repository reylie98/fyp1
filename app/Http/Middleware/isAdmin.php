<?php

namespace App\Http\Middleware;

use Closure;

class isAdmin
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
        if ($request->user() && $request->user()->admin != 1)
        {
            return redirect()->action('AdminController@logout2')->with('flash_message_error','invalid Username or Password');
        }

		return $next($request);
    }
}
