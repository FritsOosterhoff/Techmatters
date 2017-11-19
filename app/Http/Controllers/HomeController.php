<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Post;
use \App\User;
use \App\Comment;
use \App\Like;
use \App\Tag;
use Image;
use Auth;
use Storage;
use Hash;
class HomeController extends Controller
{

  /**
  * Create a new controller instance.
  *
  * @return void
  */
  public function __construct()
  {
    $this->middleware('auth', ['except' => ['home', 'newest', 'teams']]);
  }

  public function comment(Request $request)
  {
    // dd($request);
    # code...
    // print_r($request);
    $c = new Comment();
    $c->text =  $request->input('text');
    $c->user_id = Auth::id();
    $p = Post::find( $request->input('commentable_id'));
    $p->comments()->save($c);

    return response()->json($p, 200);
  }


  public function like(Request $request)
  {

    $l = new Like();
    $l->user_id = Auth::id();
    $p = Post::find( $request->input('likeable'));
    $p->likes()->save($l);

    return response()->json($p, 200);
  }


  public function removeLike(Request $request)
  {
    // $posts->photos()->where('id', '=', 1)->delete();


    $p = Post::find( $request->input('likeable'));
    $p->likes()->where('user_id', '=', Auth::id())->delete();

    return response()->json($p, 200);
  }


  /**
  * Show the application dashboard.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {

    $user = Auth::user();
    // $posts = $user->posts->paginate(20);
    // $posts
    // $teams = $user->teams;

    $posts = Post::where('user_id',  \Auth::id())->orderBy('title', 'desc')
               ->paginate(25);



    return view('home')->with(compact('posts', 'user', 'teams'));
  }


  public function newest($value='')
  {

    $posts = Post::orderBy('id', 'desc')->paginate(20);
    $user = User::find(\Auth::id());


    return view('home')->with(compact('user', 'posts'));
  }

  public function teams($value='')
  {
    # code...
    $teams = Post::where('user_id',  \Auth::id())->orderBy('id', 'desc')
    ->get()->paginate();

  }

  public function trending($value='')
  {

        $posts = Post::select(\DB::raw('posts.*, count(*) as `aggregate`'))
    ->join('likes', 'posts.id', '=', 'likes.likeable_id')
    ->groupBy('posts.id')
    ->orderBy('aggregate', 'desc')
    ->paginate(10);

    return view('home')->with(compact('posts'));

  }

  public function tags($value='')
  {
    # code...
    $posts = Post::where('text', 'like', '%#' . $value . '%')->paginate(20);
    return view('home')->with(compact('posts'));
  }

  public function search($value)
  {
      $posts = Post::where('text', 'like', '%' . $value . '%')->paginate(20);
      return view('home')->with(compact('posts'));
  }

  public function addPost(Request $request)
  {

    if ($request->has('name') && $request->has('text')) {
      //
      $post = new Post;
      $post->title = $request->name;
      $post->text = $request->text;

      preg_match_all('/#([^\s]+)/', $post->text, $matches);
      foreach ($matches[1] as $key => $value) {
        # code...
        $tag =Tag::firstOrNew(array('name' => $value));

        $tag->name = $value;
        $tag->save();
      }

      if($request->has('file')){

        $file = $request->file('file');


        $path = $file->hashName('images');
        $image = Image::make($file);
        $image->fit(480, 360, function ($constraint) {
          $constraint->aspectRatio();
        });
        Storage::put($path, (string) $image->encode());
        $post->image = $path;

      }

      $post->user_id = \Auth::id();
      $post->save();

      return back()->with('success','Image Upload successful');
    }

  }

  public function profile($user ='')
  {

    // return view('profile', array('user' => Auth::user()) );
    if(empty($user))
    $user = \Auth::user();
    else $user = User::where('username', $user)->limit(1)->get()->first();

    return view('profile', array('user' => $user) );

  }


  public function update_avatar(Request $request){

    // Handle the user upload of avatar
    if($request->hasFile('avatar')){
      $user = Auth::user();

      $avatar = $request->file('avatar');


      $filename = md5_file($avatar->getRealPath()) . '.' . $avatar->getClientOriginalExtension();
      Image::make($avatar)->resize(300, 300)->save( 'img/uploads/avatars/' . $filename ) ;

      $user->avatar = $filename;
      $user->save();
    }

    return view('profile', array('user' => Auth::user()) );

  }

  public function hash($value='')
  {
    return Hash::make($value);
  }

}
