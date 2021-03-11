<?php

namespace App\Http\Middleware;

use App\Models\Traveler;
use Closure;

class IsTraveler
{
    public function handle($request, Closure $next)
    {
        $secret = $request->cookie('secret');
        if (Traveler::where('secret', $secret)->first()) {
            return $next($request);
        }

        abort(404);
    }
}
