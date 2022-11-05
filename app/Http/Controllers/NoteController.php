<?php

namespace App\Http\Controllers;

use App\crm\customer\Models\Note;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class NoteController extends Controller
{
    // getting all the notes
    public function index(Request $request){
        return Note::all();
    }

    // getting all the notes of specific Customer
    public function customer_index(Request $request, $customer_id){
        return Note::Where('customer_id',$customer_id)->get();
    }

    // getting a note by id
    public function show($note_id){
        return Note::find($note_id) ??  response()->json(['status'=>'Not found'], ResponseAlias::HTTP_NOT_FOUND);
    }

    public function create(Request $request){
        $note = new Note();
        $note->note = $request->get('note');
        $note->customer_id = $request->get('customer_id');
        $note->save();
        return $note;
    }


    public function update (Request $request, $note_id){
        $note = Note::find($note_id);
        if(!$note){
            return response()->json(['status'=>'Not found'], ResponseAlias::HTTP_NOT_FOUND);
        }
        $note->note = $request->get('note');
        $note->save();
        return $note;
    }


    public function delete (Request $request, $note_id){
        $note = Note::find($note_id);
        if(!$note){
            return response()->json(['status'=>'Not found'], ResponseAlias::HTTP_NOT_FOUND);
        }
        $note->delete();
        return response()->json(['status'=>'Deleted'],Response::HTTP_OK);

    }
}
