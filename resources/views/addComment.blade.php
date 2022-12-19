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
    
        <form action="/saveComment" method="post">
            @csrf
            @method('POST')
            <h3>Add New Comment</h3>
            <div class="mb-3">

                <label for="post_id" class="form-label">Add comment to post number</label>
                @if (isset($postId))
                    
                <input type="text" class="form-control" name="post_id" id="post_id" placeholder="post number" value="{{$postId}}">
                @else
                <input type="text" class="form-control" name="post_id" id="post_id" placeholder="post number">
                @endif
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