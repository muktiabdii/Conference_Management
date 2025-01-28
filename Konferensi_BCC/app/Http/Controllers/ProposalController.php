<?php

namespace App\Http\Controllers;

use App\Models\Proposal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\ProposalResource;

class ProposalController extends Controller
{
    public function index()
    {
        $proposal = Proposal::all();
        return ProposalResource::collection($proposal);
    }

    public function create(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $proposal = Proposal::create([
            'title' => $request->title,
            'description' => $request->description,
            'author' => Auth::id(),
            'status' => 'pending'
        ]);

        return response()->json([
            'message' => 'Proposal created succesfully',
            'proposal' => new ProposalResource($proposal),
        ], 201);
    }

    public function detail($id)
    {
        $proposal = Proposal::findOrFail($id);
        return new ProposalResource($proposal);
    }

    public function update(Request $request, $id)
    {
        $currentUser = Auth::user();
        $proposal = Proposal::findOrFail($id);
        
        if ($currentUser->role === 'event_coordinator') {
            $request->validate([
                'status' => 'required|in:pending,accepted,rejected', 
            ]);
            
            $proposal->update(['status' => $request->status]);
            
            return response()->json([
                'message' => "Proposal has been updated to {$proposal->status}",
            ]);
        
        }

        $proposal->update($request->all());
        return new ProposalResource($proposal);
    }

    public function delete($id)
    {
        $proposal = Proposal::findOrFail($id);
        $title = $proposal->title; 
        $proposal->delete(); 

    return response()->json([
        'message' => "Proposal with title '{$title}' has been deleted successfully."
    ], 200);
    }
}
