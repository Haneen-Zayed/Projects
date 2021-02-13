<?php

namespace App\Http\Controllers\web;
use App\Models\Note;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
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
    	
         $this->$validate($request,[

            'title'=>'required',
            'content'=>'required'
        ]);

        $note=Note::create([

         'user_id'=>Auth::id(),
         'title'=>$request->title,
         'content'=>$request->content
        ]);

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
