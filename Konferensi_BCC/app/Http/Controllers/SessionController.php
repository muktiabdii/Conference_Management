<?php

namespace App\Http\Controllers;


use App\Http\Resources\SessionResource;
use App\Models\Session;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;


class SessionController extends Controller
{
    public function index()
    {
        $sessions = Session::all();
        return SessionResource::collection($sessions);
    }


    public function detail( $id )
    {
        $session = Session::findOrFail($id);
        return new SessionResource($session); 
    }
    

    public function update( Request $request, $id )
    {
        $session = Session::findOrFail($id);
        $session->update( $request->all() );
        return new SessionResource($session);
    }
    

    public function delete( $id )
    {
        $session = Session::findOrFail($id);
        $title = $session->title; 
    $session->delete(); 


    return response()->json([
        'message' => "Session with title '{$title}' has been deleted successfully."
    ], 200);
    }
}
