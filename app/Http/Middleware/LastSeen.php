<?php

namespace App\Http\Middleware;

use App\User;
use Auth;
use Carbon\Carbon;
use Closure;

class LastSeen
{
    public function handle($request, Closure $next) {

        if (!Auth::check()) {
            return $next($request);
        }

        $user = Auth::user();

        $user->update([
            'last_seen' => new Carbon(),
        ]);

        return $next($request);
    }
}
