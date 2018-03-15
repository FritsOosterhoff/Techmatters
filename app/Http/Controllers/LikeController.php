<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Like;
use App\Post;
use App\User;

class LikeController extends Controller
{
    //



      public function like(Request $request)
      {

        $l = new Like();
        $l->user_id = Auth::id();
        $p = Post::find( $request->input('likeable'));
        $p->likes()->save($l);

        $n = new Notification();
        $n->user_id = Auth::id();


        $user = User::find($p->user->id);

        $n->notifiable_id = $user->id;
        $n->notifiable_type = 'App\Like';
        dd($n);
        $user->notifications()->save($n);


        // $n->notifiable_type = 'App\Like';
        // $n->notifiable_id = $p->user->id;
        // $p->user->notifications()->save($n);

        /*
        $post = Post::find($request->input('post'));
        $comment = new Comment();
        $comment->text =  $request->input('text');
        $comment->user_id = Auth::id();
        $post->comments()->save($comment);
        */
        // $this->notify(0, $l);

        // return response()->json($p, 200);
      }


      public function removeLike(Request $request)
      {
        $p = Post::find( $request->input('likeable'));
        $p->likes()->where('user_id', '=', Auth::id())->delete();

          return response()->json($p, 200);
        }

}
