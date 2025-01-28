<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function editUser(Request $request)
    {
        $user = Auth::user();

        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return response()->json([
            'message' => 'Profile updated successfully',
            'user' => new UserResource($user),
        ]);
    }

    public function searchUser(Request $request)
    {
        $existingUser = User::where('name', $request->name)->first();

        if( $existingUser ) {
            return response()->json([
                'user' => new UserResource($existingUser),
            ]);
        }

        else {
            return response()->json([
                'message' => 'User not found',
            ]);
        }

    }
}
