<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    //return home page with different data for author and admin
    
    public function index()
    {
        if (Auth::user()->role == "admin") {
            $posts = Post::all();
            $users = User::all();
            $comments = Comment::all();
            return view('home',['posts'=> $posts, 'comments'=>$comments, 'users'=>$users]);
        }else {
            $posts = Post::all()->where('user_id',Auth::user()->id);
            $comments = Comment::all();
            return view('home',['posts'=> $posts, 'comments'=>$comments]);
        }
        
    }
}
