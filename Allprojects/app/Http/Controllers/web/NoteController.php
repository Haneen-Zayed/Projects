<?php

namespace App\Http\Controllers\web;
use App\Models\Note;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\Note as NoteResource;


class NoteController extends Controller
{
    
    public function userNotes()
    {
    	$note= Note::all();
    	return view('notes.userNotes')->with('note', $note);
    }

     public function create()
    {
    	return view('notes.create');
    }

     public function store(Request $request)
    {
    	
        $input=$request->all();
         $validator=Validator::make($input,[
            'title'=>'required',
            'content'=>'required'
        ]);

       $user=Auth::user();
       $input['user_id']=$user->id;
       $note=Note::create($input);

        return redirect()->back();


    }

     public function show($id)
    {
    	$note=Note::find($id);
    	return view('notes.show')->with('note', $note);
    }

     public function edit($id)
    {
    	$note=Note::find($id);
    	return view('notes.edit')->with('note', $note);
    }

     public function update(Request $request, $id)
    {
    	$note=Note::find($id);
    	 $this->$validate($request,[

            'title'=>'required',
            'content'=>'required'
        ]);

    	$note->title=$request->title;
    	$note->content=$request->content;
    	$note->save();
    	return redirect()->back();

    }

     public function destroy($id)
    {
    	$note=Note::find($id);
    	$note->delete();
    	return redirect()->back();
    }

}
