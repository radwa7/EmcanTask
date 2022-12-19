@extends('layouts.app')

@section('content')

<div class="container m-5">

    <div class="row mb-3">
        <div class="col-3">

            <a href="/submitPost" class="btn btn-primary">Add New Post</a>
        </div>
    </div>
<div class="row">

    @foreach ($posts as $post)
    <div class="border col-6" >
        <div class="card-body">
            <div class="row border-bottom m-3 pb-3 "> 
                <h5 class="col-5">{{$post->title}}</h5>
                {{-- <span class="col-3"></span> --}}
                <a href="/editPost/{{$post->id}}" style="margin-right: 10px" class="btn btn-success col-3 ">Edit post</a>
                <a href="/deletePost/{{$post->id}}" class="btn btn-danger col-3 ">Delete post</a>
            </div>
            <p class=" m-3 p-3"> {{$post->content}} </p>
        </div>
        
    
          
    </div>
    @endforeach
</div>
</div>
@endsection