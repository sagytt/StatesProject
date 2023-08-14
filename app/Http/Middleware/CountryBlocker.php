<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Torann\GeoIP\Location;


class CountryBlocker
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function handle(Request $request, Closure $next)
    {
        //The current local ip is 127.0.0.1
        $ip = $request->ip();

        $location = geoip()->getLocation($ip);
//        dd($location);die();
        // List of blocked country codes
        $blockedCountries = ['IL'];

        // Check if the visitor's country is in the blocked list
        if ($location && in_array($location->getAttribute('iso_code'), $blockedCountries)) {
            abort(403, 'Access Denied');
        }

        return $next($request);
    }
}
