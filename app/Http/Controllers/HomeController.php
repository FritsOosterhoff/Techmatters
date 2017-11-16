<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Post;
use \App\User;
use Image;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    $user = User::find(\Auth::id());

    $posts = $user->posts;

    $teams = $user->teams;

		// $posts = Post::where('user_id',  \Auth::id())->orderBy('title', 'desc')
    //            ->take(25)
    //            ->get();



        return view('home')->with('posts', $posts);
    }


    public function teams($value='')
    {
      # code...
      $teams = Post::where('user_id',  \Auth::id())->orderBy('title', 'desc')
                 ->take(25)
                 ->get();


    }

    public function addPost(Request $request)
    {
      # code...

      /**
      $flight = new Flight;

        $flight->name = $request->name;

        $flight->save();
    }
      **/
      //
      // $this->validate($request, [
  	  //   	'title' => 'required',
      //     'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
      //     ]);



      if ($request->has('name') && $request->has('text')) {
        //
        // dd($request);
          $post = new Post;

          $post->title = $request->name;
          $post->text = $request->text;

          if($request->has('file')){



            $image =  $request->file('file');
            $img = Image::make($image->getRealPath());




      // add callback functionality to retain maximal original image size
      $img->fit(800, 600, function ($constraint) {
          $constraint->upsize();
      });
      $path = $request->file->store('images');
      $post->image = $path;

    }
      $post->user_id = \Auth::id();
      $post->save();


          //print_r($post);
          return back()
     ->with('success','Image Upload successful');

      }

    }

    public function processImage($image)
    {

      # code...

      // open file a image resource


      print_r($img);
      print_r($image);

  /*
      $destinationPath = public_path('/img');
              $img = Image::make($image->getRealPath());
              $img->resize(100, 100, function ($constraint) {
      		    $constraint->aspectRatio();
      		})->save($destinationPath.'/'.$input['imagename']);

              $destinationPath = public_path('/images');
              $image->move($destinationPath, $input['imagename']);


      */
    }

}
