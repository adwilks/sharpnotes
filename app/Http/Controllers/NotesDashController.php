<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
