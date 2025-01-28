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

        if ($currentUser->role === 'user') {
            if ($request->id) {
                $proposal = Proposal::find($request->id);

                if (!$proposal || $proposal->author != $currentUser->id) {
                    return response()->json(['message' => 'Data not found'], 404);
                }
            }

            if ($request->isMethod('delete') || $request->isMethod('put') || $request->isMethod('get')) {
                return $next($request);
            }

            return response()->json(['message' => 'You don\'t have permission for this action'], 403);
        }

        if ($currentUser->role === 'event_coordinator') {
            if ($request->isMethod('get') || $request->isMethod('put')) {
                return $next($request);
            }

            return response()->json(['message' => 'You don\'t have permission to create or delete proposals'], 403);
        }

        return response()->json(['message' => 'Unauthorized'], 403);
    }
}
