  @extends('layouts.app')

  @section('content')


  <div class="container">
      <div class="row">

      <div class="col">
          <div class="jumbotron">
          	<h1 class="display-6" style="color: blue">
  	         	All Notes
          	</h1>

      	@if ($notes->count() > 0)
      	
          
  			  <div class="col">
			  </div>
   				<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Name</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  	@php
  		$i=1;
  	@endphp
  	@foreach($notes as $item)
    <tr>
      <th scope="row">{{$i++}}</th>
      <td>{{$item->title}}</td>
      <td>{{$item->user->name}}</td>
      <td>
      	<a href="{{route('notes.edit',['id'=>$item->id])}}" class="btn btn-warning ">Edit</a>
      	<a href="{{route('notes.show',['id'=>$item->id])}}" class="btn btn-primary">Show</a>
       	<a href="{{route('notes.delete',['id'=>$item->id])}}" class="btn btn-danger">Delete</a>

      </td>
    </tr>
    @endforeach
  </tbody>
</table>
      	@else

      			<div class="alert alert-primary" role="alert">
 						you dont have any Notes
				</div>

      	@endif
      	
      	<a class="btn btn-success" href="{{route('notes.create')}}" >create note</a>
 
         </div>
  </div>
</div>

</div>


























  @endsection