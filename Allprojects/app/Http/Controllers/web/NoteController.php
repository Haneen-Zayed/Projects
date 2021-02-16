<?php

namespace App\Http\Controllers\web;
use App\Models\Note;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Resources\Note as NoteResource;


class NoteController extends BaseController
{
	public function __construct()
	{
		$this->middleware('auth');
	}
    
    public function userNotes()
    {
    	$id=Auth::id();
    	$notes= Note::where('user_id', $id)->get();
    	return view('notes.userNotes')->with('notes', $notes);
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

         if ($validator->fails()) {
            return $this->sendErorr('Validate Error',$validator->errors());
        }


       $user=Auth::user();
       $input['user_id']=$user->id;
       $note=Note::create($input);

        return redirect()->back();


    }

     public function show($id)
    {
    	$note=Note::find($id);
    	if ( $note->user_id != Auth::id()) {
            return $this->sendErorr('You do not have rights');
        }
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
    	 $input=$request->all();
         $validator=Validator::make($input,[
            'title'=>'required',
            'content'=>'required'
        ]);
    	  if ( $note->user_id != Auth::id()) {
            return $this->sendErorr('You do not have rights');
        }

    	$note->title= $input['title'];
        $note->content= $input['content'];
    	$note->save();
    	return redirect()->back();

    }

     public function destroy($id)
    {

    	$note=Note::find($id); 
    	 if ( $note->user_id != Auth::id()) {
            return $this->sendErorr('You do not have rights');
        }
        $note->delete();
        return redirect()->back();   	
    }

}
