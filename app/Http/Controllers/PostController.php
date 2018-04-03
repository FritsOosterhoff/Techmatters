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


  public function addPost(Request $request)
  {

    if ($request->has('text')) {
      //



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

      if($request->has('file')){

        $image       = $request->file('file');
      $filename    = $image->getClientOriginalName();

      $image_resize = Image::make($image->getRealPath());
      $image_resize->fit(800, 600);
      $image_resize->save(public_path('img/uploads/images/' .$filename));
      $post->image = $filename;
        /*
      if($file->isValid())
        $path =  $file->hashName('images');
        else $path ='images/' . md5($file->getClientOriginalName()) . '.' . $file->getClientOriginalExtension();


                $filename = md5_file($file->getRealPath()) . '.' . $file->getClientOriginalExtension();
                $location = public_path('img/uploads/banners/')  . '/' . $filename;



        $image = Image::make($file);
        $image->fit(860, 600, function ($constraint) {
          $constraint->aspectRatio();
        });
        Storage::put($path, (string) $image->encode());
        $post->image = $path;
        */
      }

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
