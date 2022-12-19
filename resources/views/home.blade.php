@extends('layouts.app')

@section('content')
@if (Auth::user()->role == 'admin')
@else
<div class="container mt-5">
    <div class="row mb-5">
        <div class="col-5 border" style="margin-left: 30px; ">
            <div class="row d-flex justify-content-center m-3">
             your posts
            </div>
            <div class="row d-flex justify-content-center m-3">
                <a href="/listPosts" class="col-6 btn btn-primary">Show All Posts</a>
            </div>
            <div class="row d-flex justify-content-center m-3">
                <a href="/submitPost" class="col-6 btn btn-success">Add New Post</a>
            </div>
        </div>
        <div class="col-1"></div>
        <div class="col-5 border">
            <div class="row d-flex justify-content-center m-3">
             your comments
            </div>
            <div class="row d-flex justify-content-center m-3">
                <a href="#" class="col-6 btn btn-primary">Show All Comments</a>
            </div>
            <div class="row d-flex justify-content-center m-3">
                <a href="/addComment" class="col-6 btn btn-success">Add New Comments</a>
            </div>
        </div>
    </div>

    <div class="row">
        @foreach ($posts as $post)
        <div class="border col-12 mb-4" >
            <div class="card-body">
                <div class="row border-bottom m-3 pb-3">
                    <h5 class="col-4">{{$post->title}}</h5>
                    <span class="col-3"></span>
                    <a href="/editPost/{{$post->id}}" class="btn btn-success col-2 " style="margin-right: 10px">Edit post</a>
                    
                    <a href="/deletePost/{{$post->id}}" class="btn btn-danger col-2 ">Delete post</a>
                </div>
                <p class="border-bottom m-3 p-3"> {{$post->content}} </p>
            </div>
            <b class="ml-3 pb-3">comments</b>       
                <ul class="list-group list-group-flush border mb-3">
                
                    
                    @foreach ($comments as $comment)
                    @if ($comment->post_id == $post->id)
                        
                    <li class="list-group-item">
                        
                        
                        {{$comment->content}}
                        <span class="d-flex justify-content-end">
                            <a href="/editComment/{{$comment->id}}" class="btn btn-success" style="margin-right: 5px">Edit</a>
                            <a href="/deleteComment/{{$comment->id}}" class="btn btn-danger " >Delete</a>
                        </span>
                    </li>
                    @endif
                    @endforeach
                    
                    
                </ul>
                <a href="addComment/{{$post->id}}" class="btn btn-primary m-3">Add Comment</a>
              
        </div>
        @endforeach
    </div>
</div>
@endif
@endsection
