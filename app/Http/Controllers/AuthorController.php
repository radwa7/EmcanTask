<?php

namespace App\Http\Controllers;

use App\Models\Comment;
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
        $comments = Comment::all();
        return view('listPosts',['posts'=> $posts, 'comments'=>$comments]);
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
        return redirect('home')->with('message','Post updated');
    }

    public function deletePost($postId)
    {
        $post = Post::findOrFail($postId);
        $post->delete();
        return view('home')->with('message','Post deleted');
    }


    //commetns

    public function listComments()
    {
        
        $comments = Comment::all()->where('author_id',Auth::user()->id);
        
        return view('listComments',['comments'=>$comments]);
    }

    public function addComment()
    {
        
        return view('addComment');
    }
    
    public function addCommentToPost($postId)
    {
        return view('addComment',['postId'=>$postId]);
    }

    public function saveComment(Request $request)
    {
        $comment = $request->all();

        $this->validate($request,[
            'post_id' => 'required|exists:posts,id',
            'content' => 'required'
        ]);

        $comment['author_id'] = Auth::user()->id;
        $comment = Comment::create($comment);
        return redirect('home')->with('message','comment created');
    }

    public function editComment($commentId)
    {
        $comment = Comment::findOrFail($commentId);
        return view('editComment', ['comment'=>$comment]);
    }

    public function updateComment(Request $request,$commentId)
    {       
        
        $this->validate($request,[
            'post_id' => 'required|exists:posts,id',
            'content' => 'required'
        ]);
        $comment = Comment::findOrFail($commentId);
      
        $comment->update($request->all());
        return redirect('home')->with('message','Comment updated');
    }

    public function deleteComment($commentId)
    {
        $comment = Comment::findOrFail($commentId);
        $comment->delete();
        return view('home')->with('message','comment deleted');
        
    }
}
