<?php namespace App\Http\Middleware;

use Closure;
use App\Models\Users;

class Admin {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
        if ( $request->user()->admin == 'N' )
        {
            return redirect('/');
        }

		return $next($request);
	}

}
