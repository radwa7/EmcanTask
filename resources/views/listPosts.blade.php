@extends('layouts.app')

@section('content')

<div class="container m-5">

<div class="row">
    @foreach ($posts as $post)
    <div class="border col-6" >
        <div class="card-body">
            <div class="row border-bottom m-3 pb-3">
                <h5 class="col-3">{{$post->title}}</h5>
                <span class="col-3"></span>
                <a href="/editPost/{{$post->id}}" class="btn btn-success col-3 ">Edit post</a>
                <a href="/deletePost/{{$post->id}}" class="btn btn-danger col-3 ">Delete post</a>
            </div>
            <p class="border-bottom m-3 p-3"> {{$post->content}} </p>
        </div>
        <b class="ml-3 pb-3">comments</b>       
            <ul class="list-group list-group-flush border mb-3">
            
                {{-- @foreach ($collection as $item) --}}
                <li class="list-group-item">
                    Lorem ipsum dolor, sit amet consectetur adipisicing.
                    <span class="d-flex justify-content-end">
                        <button class="btn btn-success" >Edit</button>
                        <button class="btn btn-danger " >Delete</button>
                    </span>
                </li>
                {{-- @endforeach --}}
              
            </ul>
            <button href="/addComment" class="btn btn-primary m-3">Add Comment</button>
          
    </div>
    @endforeach
</div>
</3div>
@endsection