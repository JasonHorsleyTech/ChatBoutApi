<?php

namespace App\Http\Middleware;

use App\Models\Traveler;
use Closure;

class IsTraveler
{
    public function handle($request, Closure $next)
    {
        if ($request->has('uuid') && Traveler::where('uuid', $request->get('uuid'))->exists()) {
            return $next($request);
        }

        abort(404);
    }
}
