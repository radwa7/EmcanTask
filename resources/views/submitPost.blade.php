@extends('layouts.app')

@section('content')

<div class="container">
    @if (count($errors) > 0)
    <div class = "alert alert-danger alert-dismissible fade show" role="alert">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        
    </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div>
    @endif

    

    <div class="container m-5">
    
        <form action="/savePost" method="post">
            @csrf
            @method('POST')
            <h3>Add New Post</h3>
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" name="title" id="title" placeholder="post title">
          </div>
          <div class="mb-3">
            <label for="content" class="form-label">content</label>
            <textarea class="form-control" name="content" id="content" rows="3"></textarea>
          </div>
          <div class="mb-3">
            <button class="btn btn-success" type="submit">Add</button>
          </div>
        </form>
    </div> 
     
@endsection