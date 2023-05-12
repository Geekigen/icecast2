<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class adminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $adminMail= Env('ADMIN_MAIL');
        if ($request->user()->email != $adminMail ) {
            return redirect()->back()->with('status',"Access denied ");

        }
        return $next($request);
    }
}
