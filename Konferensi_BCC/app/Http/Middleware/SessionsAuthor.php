<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class SessionsAuthor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $currentUser = Auth::user();
        $session = Session::findOrFail($request->id);

        if( $session->author != $currentUser->id ) {
            return response()->json(['message' => 'data not found'], 404);
        }

        return $next($request);
    }
}
