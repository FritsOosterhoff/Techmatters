<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Post;
use \App\User;
use \App\Follower;
use \App\Comment;
use \App\Like;
use \App\Tag;
use \App\Notification;
use Image;
use Auth;
use Storage;
use Symfony\Component\HttpFoundation\File\UploadedFile;

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
    $this->middleware('auth', ['except' => ['home', 'newest', 'trending',  'teams']]);
  }







  public function home($value='')
  {
    # code...

    $media = \DB::table('posts')->select('image', 'id')->orderBy('updated_at', 'desc')->limit(6)->get();

    // $posts = Post::orderBy('id', 'desc')->where('image', '!=', "")->limit(50)->get();


    $posts = Post::select(\DB::raw('posts.*, count(*) as `aggregate`'))
    ->join('likes', 'posts.id', '=', 'likes.likeable_id')
    ->groupBy('posts.id')
    ->orderBy('aggregate', 'desc')
    ->limit(21)->get();

    $title = 'Home';

    return view('new.new_front')->with(compact('posts', 'media', 'title'));

  }

  /**
  * Show the application dashboard.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {

    $user = Auth::user();

    $posts = Post::where('user_id',  \Auth::id())->orderBy('title', 'desc')
    ->paginate(25);


    return view('new.home')->with(compact('posts', 'user', 'teams'));
  }


  public function newest($value='')
  {
    $nr = (Auth::check() ? 8 : 9);
    $posts = Post::orderBy('id', 'desc')->paginate($nr);

    $title = 'Newest Posts';

    $notifications = Notification::where('notifiable_id', '=', Auth::id())->get();

    return view('new.home')->with(compact('posts', 'title'));
  }

  public function teams($value='')
  {
    # code...
    $teams = Post::where('user_id',  \Auth::id())->orderBy('id', 'desc')
    ->get()->paginate();

  }

  public function trending($value='')
  {
    $nr = (Auth::check() ? 8 : 9);

    $posts = Post::select(\DB::raw('posts.*, count(*) as `aggregate`'))
    ->join('likes', 'posts.id', '=', 'likes.likeable_id')
    ->groupBy('posts.id')
    ->orderBy('aggregate', 'desc')
    ->paginate($nr);


    $title = 'Trending';

    return view('new.home')->with(compact('posts', 'title'));
  }

  public function following($value='')
  {
    $posts = array();



    $posts = \DB::table('posts', 'likes')
    ->join('users', 'posts.user_id', '=', 'users.id')
    ->join('followers', 'users.id', '=', 'followers.followable_id')
    ->leftJoin('likes', 'posts.id', '=', 'likes.likeable_id')
    ->where('followers.user_id', '=', Auth::id())
    ->groupBy('posts.id')->orderBy('posts.updated_at', 'desc')
    ->select('posts.*', 'users.*', 'likes.*')
    ->selectRaw('count(likes.likeable_id) as likes')
    ->paginate(20);


    $follows = Follower::all()->where('user_id', Auth::id());
    $posts = array();
    $c = 0;
    foreach ($follows as $key => $follow) {
      foreach ($follow->followable->posts as $key => $post) {
        $posts[$c] = $post;

        $c++;
      }
    }

    $posts = collect($posts)->sortByDesc('updated_at');


    $posts = $this->paginate($posts);

    $title = 'Following';

    return view('new.home')->with(compact('posts', 'title'));

  }

  /**
  * Gera a paginação dos itens de um array ou collection.
  *
  * @param array|Collection      $items
  * @param int   $perPage
  * @param int  $page
  * @param array $options
  *
  * @return LengthAwarePaginator

  *
  *asd
  *use Illuminate\Pagination\LengthAwarePaginator;
  *use Illuminate\Pagination\Paginator;
  *Illuminate\Support\Collection
  */
  public function paginate($items, $perPage = 15, $page = null, $options = [])
  {
    $page = $page ?: (\Illuminate\Pagination\Paginator::resolveCurrentPage() ?: 1);
    $items = $items instanceof \Illuminate\Support\Collection ? $items : \Illuminate\Support\Collection::make($items);
    return new \Illuminate\Pagination\LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
  }

  public function tags($value='')
  {
    # code...
    $posts = Post::where('text', 'like', '%#' . $value . '%')->paginate(8);

    $title = 'Posts tagged with: ' . $value;

    return view('new.home')->with(compact('posts', 'title'));
  }

  public function search($value)
  {
    $posts = Post::where('text', 'like', '%' . $value . '%')->paginate(8);

    $title = 'Search results for: ' . $value;

    return view('new.home')->with(compact('posts', 'title'));
  }





  public function profile($username ='')
  {

    if(empty($username))
    $user = \Auth::user();
    else $user = User::where('username', $username)->limit(1)->get()->first();

    $title = $user->username . "'s Activity";

    return view('new.profile')->with(compact('user', 'title') );

  }


  public function update_avatar(Request $request){

    // Handle the user upload of avatar
    $user = Auth::user();


    if($request->hasFile('avatar')){

      $avatar = $request->file('avatar');

      $filename = md5_file($avatar->getRealPath()) . '.' . $avatar->getClientOriginalExtension();
      $location = public_path('img/uploads/avatars/')  . '/' . $filename;
      Image::make($avatar)->resize(300, 300)->save($location) ;

      $user->avatar = $filename;
      $user->save();
    }

    $title = $user->username . "'s Profile";
    // dd($user);
    return view('new.profile')->with(compact('user', 'title'));

  }



    public function update_banner(Request $request){

      // Handle the user upload of avatar
      $user = Auth::user();


      if($request->hasFile('banner')){

        $banner = $request->file('banner');

        $filename = md5_file($banner->getRealPath()) . '.' . $banner->getClientOriginalExtension();
        $location = public_path('img/uploads/banners/')  . '/' . $filename;
        Image::make($banner)->resize(1920, 1080)->save($location) ;

        $user->banner = $filename;
        $user->save();
      }

      $title = $user->username . "'s Profile";
      return view('new.profile')->with(compact('user', 'title'));

    }


  public function hash($value='')
  {
    return Hash::make($value);
  }

  public function notifications($value='')
  {
    $notifications =  Notification::where('user_id', '=', \Auth::id())->get();
    $title = "Notifications";
    return view('new.notifications')->with(compact('notifactions', 'title'));
  }


  public function notify($type, $model)
  {
    $n = new Notification();
    $n->user_id = Auth::id();
    switch ($type) {
      case 0:
      $type = 'App\Like';
      break;
      case 1:
      $type = 'App\Comment';
      break;
      case 2:
      $type = 'App\Follow';
      break;
    }

    $n->type = $type;

    $model->user()->notifications()->save($n);
  }

}
