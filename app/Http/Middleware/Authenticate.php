<?php

namespace App\Http\Middleware;
use Request;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (!$request->expectsJson()) {
            if (Request::is('admin/*') || Request::is('admin') || Request::is('en/admin/*') || Request::is('ar/admin/*') ||  Request::is('en/admin') || Request::is('ar/admin') )
                return route('get.admin.login');
            else
                return url('/');

        }
    }
}
