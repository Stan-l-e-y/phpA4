<?php

namespace App\Http\Middleware;

use App\User;
use Closure;

class Status
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
        $user = User::find(auth()->id());


        if ($user->status == 'Inactive') {
            auth()->logout();
            return redirect('/')->with('error', 'Employee Inactive');
        }
        return $next($request);
    }
}
