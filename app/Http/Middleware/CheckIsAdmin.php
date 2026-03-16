<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckIsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response {
 
        if( !auth( "sanctum" )->check() || !auth( "sanctum" )->user()->isAdmin() ) {
 
            return response()->json([
                "message" => "Jogosultság hiány." 
            ], 403);
        }
 
        return $next($request);
    }
}