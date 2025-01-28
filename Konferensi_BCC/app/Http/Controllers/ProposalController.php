<?php

namespace App\Http\Controllers;

use App\Models\Proposal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\ProposalResource;

class ProposalController extends Controller
{
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
        $proposal = Proposal::findOrFail($id);
        $proposal->update($request->all());
        return new ProposalResource($proposal);
    }
}
