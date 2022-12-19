@extends('layouts.app')

@section('content')

<div class="container m-5">

    <div class="">
    @foreach ($posts as $post)
    <div class="card m-3" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">{{$post->title}}</h5>
            <p class="card-text"> {{$post->content}} </p>
            <a href="/editPost/{{$post->id}}" class="btn btn-success">Edit</a>
            <a href="/deletePost/{{$post->id}}" class="btn btn-danger">Delete</a>
        </div>
    </div>
    @endforeach
</div>
</div>
@endsection