@extends('layouts.app')

@section('content')
<div class="container">

    @foreach ($comments as $comment)
    <div class="border col-10 m-3" >
        <div class="card-body">
            <p  class=" m-3">Comment: {{$comment->content}} </p>
            <p  class=" m-3">Post Id: {{$comment->post_id}} </p>
            <div class="row border-top m-3 pt-3 "> 
                
                <a href="/editComment/{{$comment->id}}" style="margin-right: 10px" class="btn btn-success col-3 ">Edit comment</a>
                <a href="/deleteComment/{{$comment->id}}" class="btn btn-danger col-3 ">Delete comment</a>
            </div>
        </div>
        
    
          
    </div>
    @endforeach
</div>
@endsection