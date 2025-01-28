<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Proposal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class ProposalRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $currentUser = Auth::user();

        if( $currentUser->role === 'user' ) {
            $proposal = Proposal::findOrFail($request->id);

            if( $proposal->author != $currentUser->id ) {
                return response()->json(['message' => 'Data not found'], 404);
            }

            return $next($request);
        }

        else {
            return response()->json(['message' => 'au']);
        }
    }
}
