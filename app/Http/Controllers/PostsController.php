<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Comment;
use App\Http\Requests\PostForm;
use App\Http\Requests\CommentForm;
use Auth;

class PostsController extends Controller
{
    public function getAll()
    {
        return view("posts.list")->with('posts', Post::with("user")->paginate(2)->setPath('all'));
    }

    /*
    * display form posts
    */
    public function getCreate()
    {
        return view("posts.create");
    }

    public function postCreate(PostForm $postForm)
    {
        $post = new Post;
        $post->title = \Request::input('title');
        $post->content = \Request::input('content');
        $post->user_id = Auth::user()->id;
        $post->save();
        \Session::flash('post_created', \Lang::get("messages.post_created"));
        return redirect()->back();
    }

    /*
    * display form posts for edit
    */
    public function getEdit($id)
    {
        $post = Post::find($id);
        if($post)
        {
            return view("posts.edit")->with('post', $post);
        }
        return redirect()->back();
    }

    public function postEdit(PostForm $postForm, $id)
    {
        $post = Post::find($id);
        $post->title = \Request::input('title');
        $post->content = \Request::input('content');
        $post->user_id = \Request::input('user_id');
        $post->save();
        \Session::flash('post_updated', \Lang::get("messages.post_updated"));
        return redirect()->back();
    }

    public function getDetail($id)
    {
        $post = Post::find($id);
        if($post)
        {
            $comments = Comment::with("user")->where("post_id", "=", $id)->get();
            return view("posts.detail")->with(array('post' => $post, "comments" => $comments));
        }
        return redirect()->back();
    }

    public function postComment(CommentForm $commentForm, $id)
    {
        $comment = new Comment;
        $comment->subject = \Request::input("subject");
        $comment->comment = \Request::input("comment");
        $comment->post_id = $id;
        $comment->user_id = Auth::user()->id;
        $comment->save();
        \Session::flash('comment_saved', \Lang::get("messages.comment_saved"));
        return redirect()->back();
    }

    public function deleteDestroy($id)
    {
        $post = Post::find($id);
        if($post)
        {
            $post->delete();
            \Session::flash('post_deleted', \Lang::get("messages.post_deleted"));
        }
        return redirect()->back();
    }
}
