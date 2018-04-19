@extends('techmatters.app')

@section('content')



<section class="col-md-8">

  <article class="row white-bg">
    <div class="image-container">
      <img class="img-fluid" src="{{url('img/uploads/images/' . $article->image)}}" />
    </div>
    <div class="article-container mt-3">
      <div class="tags">
        <a href="#" class="tag-item">News</a>
      </div>
      <div class="article-header">
        <h3>{{$article->title}}</h3>
      </div>
      <div class="article-post-data">
        <ul class="post-meta">
          <li class="post-date">
            {{$article->created}}
          </li>
          <li class="post-author">
            by <a href="{{url('profile') . '/' . $article->user->username}}">{{$article->user->username}}</a>
          </li>
        </ul>
      </div>
      <div class="article-small-content">
        <p>{{$article->text}}</p>
      </div>
    </div>
  </article>




  <div class="comments py-5">
    <h3 class="text-center mb-5">Comments</h3>
    <div class="row">
      <div class="col-md-12 comment">

        <form class="form-horizontal" method="POST" action="{{url('/articles/comment')}}" enctype="multipart/form-data">
          <input type="hidden" name="_token" value="Z7a0Hz7mXdbbP5MOsNqoWQdiOyJncH35oY17vFph">
          <input type="hidden" name="article" value="{{$article->id}}">
          <div class="form-group">
            <textarea style="background:#eff1f5; padding:10px;" class="form-control" rows="5" name="text" placeholder="What are you thinking?"></textarea>
          </div>

          <div class="form-group">
            <button type="submit" class="btn btn-primary pull-right">
              Post
            </button>
          </div>
        </form>
      </div>
    </div>

    @foreach($article->comments as $comment)
    <div class="col-md-12 comment">

      <div class="user p-2">
        <img class="avatar rounded-circle" src="{{url('img/uploads/avatars/' . $comment->user->avatar)}}" />
        <div class="details">
          <b> {{$comment->user->username}}</b>
          <p class="small"><span>{{$comment->updated_at}}</span></p>
        </div>
      </div>
      <div class="col-md-8">
        <p class=" rounded" style="background:#eff1f5; padding:10px;">
          {{$comment->text}}
        </p>
      </div>
    </div>
    @endforeach
  </div>
</section>

<section class="col-md-4 sidebar col float-right">
  @include('techmatters.sidebar')
</section>
@endsection
