<?php

namespace App\Http\Controllers;

use App\Models\Traveler;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Find ~authed~ traveler based on secret, or fail
     *
     * @return Traveler
     */
    protected static function getTraveler()
    {
        $secret = request()->cookie('secret');

        info($secret);

        return Traveler::where('secret', $secret)->firstOrFail();
    }
}
