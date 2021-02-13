<?php

namespace App\Http\Controllers\API;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\API\BaseController as BaseController;
use Validator;
use App\Http\Resources\Note as NoteResource;

class NoteController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  


     public function userNotes($id)
    {
        $notes= Note::where('user_id', $id)->get();
        return $this->sendResponse(NoteResource::collection($notes), 'There are All your Notes');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

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
        return $this->sendResponse($note, 'Notes added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $note=Note::find($id);
        if (is_null($note)) {
            return $this->sendErorr('Note not found');
        }
        return $this->sendResponse(new NoteResource($note), ' This is your Note');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */

    public function update(Note $note,Request $request)
    {
       

        $input=$request->all();
         $validator=Validator::make($request->all(),[
            'title'=>'required',
            'content'=>'required'
        ]);

       
         if ( $note->user_id != Auth::id()) {
            return $this->sendErorr('You do not have rights');
        }

        if ($validator->fails()) {
            return $this->sendErorr('Validation error', $validator->errors());
        }

        $note->title= $input['title'];
        $note->content= $input['content'];
        $note->save();
        return $this->sendResponse(new NoteResource($note), 'Note updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $note=Note::find($id);
        if (is_null($note)) {
            return $this->sendErorr('Note not found');
        }

        if ( $note->user_id != Auth::id()) {
            return $this->sendErorr('You do not have rights');
        }

        $note->delete();
        return $this->sendResponse(new NoteResource($note), 'Note deleted successfully');
    }
}
