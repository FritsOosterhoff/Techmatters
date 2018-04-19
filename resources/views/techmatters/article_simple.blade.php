<article class="row py-2">
  <div class="image-container col-4 col-md-4">
    <a href="{{url('articles/' . $article->id)}}" class="d-block">
      <img class="img-fluid" src="{{url('img/uploads/images/' . $article->image)}}" />
    </a>
  </div>
  <div class="article-container col-8 col-md-8">
    <div class="tags">
      <a href="#" class="tag-item">News</a>
    </div>
    <div class="article-header">
      <a href="{{url('articles/' . $article->id)}}"><h3>{{$article->title}}</h3></a>
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
  </div>
</article>
