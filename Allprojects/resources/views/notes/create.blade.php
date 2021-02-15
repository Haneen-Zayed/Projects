
    @extends('layouts.app')

    @section('content')





    <div class="container" style="padding-top: 10%">
      <div class="row">
        <div class="col-md-6 offset-md-3">

          <div class="card">
            <div class="card-header">
              Add New Note    
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

              <form method="POST" action="{{route('notes.store')}}" >
                @csrf
                <div class="form-group">
                <label for="title">Note Title</label>
                <input type="text" name="title" class="form-control" placeholder="Enter Note Title"/>
                </div>
                <div class="form-group">
                  <label for="body">Note Content</label>
                  <textarea class="form-control" name="content" placeholder="Enter Note Content" rows="3"></textarea> 
                </div>
                @csrf
                
                 
                 <input class="btn btn-dark" type="submit" value="Save"/ >
                 <a href="{{route('notes.userNotes')}}" class="btn btn-dark">All Notes</a>
                @csrf

              </form>
              
            </div>
            
          </div>
          
        </div>
        
      </div>
      
    </div>
    
    @endsection




