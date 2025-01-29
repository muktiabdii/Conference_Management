<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class FeedbackRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $currentUser = Auth::user();

        if( $currentUser->role === 'event_coordinator' ) {
            if( $request->isMethod('delete') ) {
                return $next($request);
            }

            else {
                return response()->json(['message' => 'Your don\'t have permission to create feedbacks']);
            }
        }

        else {
            if( $request->isMethod('post') ) {
                return $next($request);
            }

            else {
                return response()->json(['message' => 'You don\'t have permission to delete feedbacks']);
            }
        }
    }
}
