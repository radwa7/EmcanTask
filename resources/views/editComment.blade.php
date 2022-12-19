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
    
        <form action="/updateComment/{{$comment->id}}" method="post">
            @csrf
            @method('POST')
            <h3>Edit Comment</h3>
            <div class="mb-3">
                <label for="post_id" class="form-label" ></label>
                <input type="hidden" class="form-control" name="post_id" id="post_id" value=" {{$comment->post_id}} ">
          </div>
          <div class="mb-3">
            <label for="content" class="form-label">content</label>
            <textarea class="form-control" name="content" id="content" rows="3">{{$comment->content}}
            </textarea>
          </div>
          <div class="mb-3">
            <button class="btn btn-success" type="submit">update</button>
          </div>
        </form>
    </div> 
    
@endsection