<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;

class ApiController extends Controller
{
    public function allNote(){
        $notes = Note::all();
        return response()->json(['Notes' => $notes], 200);

    }


    public function addNote(Request $request){
        $note =new Note ();
        $note->title = $request->title;
        $note->description = $request->description;
        $result = $note->save();

        if($result){
            return response('Note Add Succeful');
        }

        else{
            return response('Note Create Unsucceful');
        }



    }

    public function updateNote(Request $request, $id){
        $note = Note::find($id);
        $note->update($request->all());

    }

    public function deleteNote($id){
        $note = Note::find($id);
        $note->delete();

        return response('Deleted Succefully');

    }


}
