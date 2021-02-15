<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="=width-device-width, initial-scale-1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Create your notes</title>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">


</head>
<body>

  <section>
    <div class="container" style="padding-top: 10%">
      <div class="row">
        <div class="col-md-6 offset-md-3">
          <div class="card">
            <div class="card-header">
              Add New Note    
            </div>
            <div class="card-body">
        


              <form method="POST" action="{{route('notes.store')}}" >
                @csrf
                <div class="form-group">
                <label for="title">Note Title</label>
                <input type="text" name="title" class="form-control" placeholder="Enter Note Title"/>
                </div>
                <div class="form-group">
                  <label for="body">Note Content</label>
                  <textarea class="form-control" name="content" rows="3"></textarea> 
                </div>
                @csrf
                <input type="submit" value="Save"/ >
                @csrf
              </form>
              
            </div>
            
          </div>
          
        </div>
        
      </div>
      
    </div>
    




  </section>





<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>

</body>
</html>