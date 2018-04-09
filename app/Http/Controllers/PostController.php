<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Post;
use App\User;
use App\Tag;

use Image;
use Storage;

class PostController extends Controller
{
  //
  /**
  * Create a new controller instance.
  *
  * @return void
  */
  public function __construct()
  {
    $this->middleware('auth', ['except' => ['post']]);
  }


  public function addPost(Request $request)
  {



    if ($request->has('text')) {

      $post = new Post;
      $post->title = 'title';
      $post->text = $request->text;

      preg_match_all('/#([^\s]+)/', $post->text, $matches);
      foreach ($matches[1] as $key => $value) {
        # code...
        $tag =Tag::firstOrNew(array('name' => $value));

        $tag->name = $value;
        $tag->save();
      }

      $images = array();
      if(!empty($request->file('files') ) ) {

        foreach ($request->file('files') as $key => $file) {
          print_R(52);
            $file2 = Image::make($file->getRealPath());
            $file2->fit(800,600);
              $filename = md5($file->getClientOriginalName()) . '.' . $file->getClientOriginalExtension();
              $file2->save(public_path('img/uploads/images/' . $filename ));
              array_push($images, $filename);
            //$thumb = $file->fit(150, 150);
        }
      }

      $post->image = serialize($images);

      // if($request->has('file')){
      //
      //   $image = $request->file('file');
      //   $filename = $image->getClientOriginalName();
      //   $image_resize = Image::make($image->getRealPath());
      //   $image_resize->fit(800, 600);
      //   $filename = md5($filename) . '.' . $image->getClientOriginalExtension();
      //   $image_resize->save(public_path('img/uploads/images/' . $filename ));
      //   $post->image = $filename;
      //
      // }

      $post->user_id = \Auth::id();
      $post->save();

      return redirect('');
      // return back()->with('success','Image Upload successful');
    }

  }

  public function removePost(Request $request)
  {
    $p = Post::find( $request->input('post_id'));
    $p->delete();

    return response()->json($p, 200);
  }


  public function post($value='')
  {
    $post = Post::find($value);
    $title = $post->title;

    return view('techmatters.post')->with(compact('post', 'title'));
  }
}
