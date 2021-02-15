
    @extends('layouts.app')

    @section('content')





    <div class="container" style="padding-top: 10%; background-color: blue">
    <h1>Your Note</h1>
           
            <div class="card">
               <div class="card-header">
                              {{$note->title}}
                    </div>
                       <div class="card-body">
                          
                                 <p class="card-text">{{$note->content}}</p>
                                 <p class="card-text"> created_at: {{$note->created_at->diffForhumans()}}</p>
                                 <p class="card-text">updated_at: {{$note->updated_at->diffForhumans()}}</p>
                                        <a href="{{route('notes.userNotes')}}" class="btn btn-primary">Back</a>
                                         @csrf
                                 </div>
                                    </div>
                                       </div>
    @endsection




