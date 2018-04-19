<?php

namespace App\Http\Controllers;
use Validator;

use Illuminate\Http\Request;
use Auth;
use App\Post;
use App\User;
use App\Article;
use App\Tag;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\View;
use Image;
use Storage;

class PostController extends Controller
{

  protected $sidebar;

    /**
    * Create a new controller instance.
    *
    * @return void
    */
    public function __construct()
    {
      $this->middleware('auth', ['except' => ['home', 'newest', 'trending',  'teams', 'about']]);
      $articles = Article::orderBy('id', 'desc')->limit(3)->get();
      $media = Post::select('image', 'id')->whereNotNull('image')->groupBy('image')->orderBy('updated_at', 'desc')->limit(6)->get();
      $tags = Tag::all();
      $this->sidebar = collect(['articles' => $articles, 'media' => $media, 'tags' => $tags]);

      View::share('sidebar', $this->sidebar);

    }

  /**
  * Store a new blog post.
  *
  * @param  Request  $request
  * @return Response
  */
  public function addPost(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'text' => 'max:255',
      'files.*' =>  'mimes:jpg,jpeg,png,bmp|max:20000'
    ]);

    if ($validator->fails()) {
      return back()->withErrors($validator)->withInput();
    }

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

          $file2 = Image::make($file->getRealPath());
          $file2->fit(800,600);
          $filename = md5($file->getClientOriginalName()) . '.' . $file->getClientOriginalExtension();
          $file2->save(public_path('img/uploads/images/' . $filename ));
          array_push($images, $filename);
          //$thumb = $file->fit(150, 150);
        }
      }

      if(!empty($images))
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
