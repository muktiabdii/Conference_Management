<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class SessionRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $currentUser = Auth::user();

        if( $currentUser->role === 'user' ) {
            $session = Session::findOrFail($request->id);
    
            if( $session->author != $currentUser->id ) {
                return response()->json(['message' => 'Data not found'], 404);
            }
    
            return $next($request);
        }

        else if( $currentUser->role === 'event_coordinator') {
            if( $request->isMethod('put') ) {
                return response()->json(['message' => 'You don\'t have a permission to update this session'], 400);
            }

            else {
                return $next($request);
            }
    
        }
        
    }
}
