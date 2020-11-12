<?php

namespace App\Http\Middleware;

use Auth;
use App\User;
use Closure;

class AfterMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

       $responce= $next($request);
        $user = $request->user();
        if($user && $user->flag==0){
            $this->guard()->logout();
            return redirect(route('erorr'));
        }

return $responce;

    }
    protected function guard()
    {
        return auth()->guard();

    }
}

