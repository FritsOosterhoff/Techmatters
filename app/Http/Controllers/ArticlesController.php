<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Post;
use App\Article;
use App\User;
use App\Tag;
class ArticlesController extends Controller
{
    //

    public function index($value='')
    {
      $articles = Article::orderBy('id', 'desc')->paginate(20);

      $interesting_articles = Article::orderBy('id', 'asc')->limit(5)->get();



      $title = 'Articles';
      return view('techmatters.articles')->with(compact('articles', 'title', 'interesting_articles'));
    }

    public function article($id = "")
    {
        $article = Article::find($id);
        $title = $article->title;
        return view('techmatters.article')->with(compact('title', 'article'));
    }

    public function create(Request $request)
    {

      if ($request->isMethod('post')) {
            if ($request->has('text')) {


              $post = new Article;
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

                $image = $request->file('file');
                $filename = $image->getClientOriginalName();
                $image_resize = Image::make($image->getRealPath());
                $image_resize->fit(800, 600);
                $filename = md5($filename) . '.' . $image->getClientOriginalExtension();
                $image_resize->save(public_path('img/uploads/images/' . $filename ));
                $post->image = $filename;

              }

              $post->user_id = \Auth::id();
              $post->save();

              return redirect('');
              // return back()->with('success','Image Upload successful');
            }
      }
      $title = "Create article";
      return view('techmatters.article_form')->with(compact('title'));

    }

    public function add($value='')
    {
      # code...  $title = "Create article";
      $title = "Create article";
      return view('techmatters.article_form')->with(compact('title'));
    }

}
