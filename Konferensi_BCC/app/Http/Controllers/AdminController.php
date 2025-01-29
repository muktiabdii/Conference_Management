<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function createEventCoordinator (Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'event_coordinator', 
        ]);

        return response()->json([
            'message' => 'Event Coordinator account has been created successfully.',
            'user' => new UserResource($user),
        ], 201);
    }
}
