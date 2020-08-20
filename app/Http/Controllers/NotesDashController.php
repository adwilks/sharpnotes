<?php


namespace App\Http\Controllers;


use App\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\JWT;
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

    public function getUserNotes() {
        if($user = Auth::user()) {
            $user = Auth::user();
            $notes = $user->notes;
            return view('notesdash', compact('notes'));
        } else {
            return redirect('/');
        }
    }


    public function storeNote(Request $request) {
        $data = $request->all();

        if ($user = Auth::user()) {
            $user->notes()->create($data);
            return redirect('/notesdash');
        } else {
            return redirect('/');
        }


    }

    public function editNote(Request $request, $id) {
        if ($user = Auth::user()){
            $note = Note::where('id', $id)->first();
            $note->update($request->all());
            return redirect('/notesdash');
        } else {
            return redirect('/');
        }

    }


    public  function  deleteNote($id) {
        if ($user = Auth::user()){
            $note = $user->notes->where('id', $id)->first;
            $note->delete();
            return redirect('/notesdash');
        } else {
            return redirect('/');
        }


    }
}
