<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Comment;
use App\Post;
class CommentController extends Controller
{


      public function comment(Request $request)
      {
        $c = new Comment();
        $c->text =  $request->input('text');
        $c->user_id = Auth::id();
        $p = Post::find( $request->input('post'));
        $p->comments()->save($c);

        return back();
      }


        public function addComment(Request $request)
        {
          $post = Post::find($request->input('post'));
          $comment = new Comment();
          $comment->text =  $request->input('text');
          $comment->user_id = Auth::id();
          $post->comments()->save($comment);

          return back();
        }

}
