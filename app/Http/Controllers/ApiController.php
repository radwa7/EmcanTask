<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;

class ApiController extends Controller
{
    public function adminDashboard()
    {
            
        $posts =  Post::all();
        $comments =  Comment::all();
        return response()->json([
            'posts' => $posts,
            'comments' => $comments
        ], 200);
        
    }

    public function authorDashboard($id)
    {
        $posts =  Post::all()->where('user_id',$id);
        $comments =  Comment::all()->where('author_id',$id);
        if (!empty($posts)) {
            return response()->json([
                'posts' => $posts,
                'comments' => $comments
            ], 200);
        }else{            
            return response()->json( [
                'status' => false,
                'message' => "User doesn't exist"
            ], 400);
        }
    }
}
