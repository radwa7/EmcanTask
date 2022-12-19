@extends('layouts.app')

@section('content')
@if (Auth::user()->role == 'admin')
@else
<div class="container mt-5">
    <div class="row">
        <div class="col-5 border">
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
                <a href="#" class="col-6 btn btn-success">Add New Comments</a>
            </div>
        </div>
    </div>
</div>
@endif
@endsection
