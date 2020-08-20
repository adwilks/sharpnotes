<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Token;

class NotesDashController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }



    public function showNotePage() {
        $token = $_COOKIE['token'];
        $token = new Token($token);
        $user = JWTAuth::Decode($token);
        return $user;

        if ($user = Auth::user()){
            $notes = $user->notes();
            return view('notesdash', compact('notes'));
        } else {
            return redirect('/');
        }



    }

    public function storeNote(Request $request) {
        $data = $request->all();
        if ($user = Auth::user()) {
            $user->notes()->create($data);
        } else {
            return redirect('/');
        }


    }

    public function editNote($id) {
        if ($user = Auth::user()){
            return $note = $user->notes()->where('id', $id)->first;
        } else {
            return redirect('/');
        }

    }


    public  function  deleteNote($id) {
        if ($user = Auth::user()){
            $note = $user->notes()->where('id', $id)->first;
            $note->delete();
            return redirect('/notesdash');
        } else {
            return redirect('/');
        }


    }
}
