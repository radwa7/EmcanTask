<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthorController extends Controller
{
    public function submitPost()
    {
        return view('submitPost');
    }

    public function savePost(Request $request)
    {       
        $post = $request->all();

        $this->validate($request,[
            'title' => 'required',
            'content' => 'required'
        ]);

        $post['user_id'] = Auth::user()->id;
        $post = Post::create($post);
        return redirect('home')->with('message','Post created');
    }

    public function listPosts()
    {
        $posts = Post::all()->where('user_id',Auth::user()->id);
        return view('listPosts',['posts'=> $posts]);
    }

    public function editPost($postId)
    {
        $post = Post::findOrFail($postId);
        return view('editPost', ['post'=>$post]);
    }

    public function updatePost(Request $request,$postId)
    {       
        
        $this->validate($request,[
            'title' => 'required',
            'content' => 'required'
        ]);
        $post = Post::findOrFail($postId);
        $post->update($request->all());
        return redirect('listPosts')->with('message','Post updated');
    }

    public function deletePost($postId)
    {
        $post = Post::findOrFail($postId);
        $post->delete();
        return view('listPosts')->with('message','Post deleted');
    }
}
