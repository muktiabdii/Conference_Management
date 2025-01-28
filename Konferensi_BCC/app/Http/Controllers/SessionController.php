<?php

namespace App\Http\Controllers;

use App\Http\Resources\SessionResource;
use App\Models\Session;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function index()
    {
        $sessions = Session::all();
        return SessionResource::collection($sessions);
    }

    public function detail(Request $request, $id)
    {
        $session = Session::findOrFail($id);
        return new SessionResource($session); 
    }
    
    public function update(Request $request, $id)
    {
        $session = Session::findOrFail($id);
        $session->update($request->all());
        return new SessionResource($session);
    }
}
