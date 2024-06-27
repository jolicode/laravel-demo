<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;

class SetAppLocale
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, \Closure $next)
    {
        $locale = $request->route('_locale', App::getLocale()); // Get the first segment of the URL (the locale)

        $request->route()->forgetParameter('_locale'); // Remove the locale from the route parameters

        App::setLocale($locale); // Set the locale for the request

        URL::defaults(['_locale' => $locale]); // Set the locale variable for the URL generator

        return $next($request);
    }
}
