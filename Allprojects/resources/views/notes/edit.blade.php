
    @extends('layouts.app')

    @section('content')





    <div class="container" style="padding-top: 10%">
      <div class="row">
        <div class="col-md-6 offset-md-3">

          <div class="card">
            <div class="card-header">
              Edit Your Note    
            </div>
            <div>
          
            
           
             
           
            <div class="card-body">

              <div>
              @if($errors->any())
                @foreach($errors->all() as $item)
                <div class="alert alert-success" role="alert">
                  {{$item}}
                </div>
                @endforeach
              @endif
               </div>

              <form method="POST" action="{{route('notes.update', ['id'=>$note->id])}}" >
                @csrf
                <div class="form-group">
                <label for="title">Note Title</label>
                <input type="text" name="title" class="form-control" value="{{$note->title}}" placeholder="Enter Note Title"/>
                </div>
                <div class="form-group">
                  <label for="content">Note Content</label>
                  <textarea class="form-control" name="content" rows="3" placeholder="Enter Note Content">{{$note->content}}</textarea>
                </div>
                @csrf
                
                 
                 <input class="btn btn-dark" type="submit" value="Update"/ >
                 <a href="{{route('notes.userNotes')}}" class="btn btn-dark">Back</a>
                @csrf

              </form>
              
            </div>
            
          </div>
          
        </div>
        
      </div>
      
    </div>
    
    @endsection




