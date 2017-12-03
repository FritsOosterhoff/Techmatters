

<div class="col-md-4 my-3">
  <a href="{{url('post/' . $post->id)}}" style="text-decoration:none;color:black">
  <div class="card">
    <img class="img-fluid" src="{{ (strpos($post->image, 'http')===false) ? url('/img/uploads/' . $post->image) : $post->image}}" alt="Card image">
    <div class="card-body">
      <p class="card-text p-y-1">
        {!! $post->text = preg_replace('/(?:^|\s)#(\w+)/',' <a href="'. url("tag/$1") . '">#$1</a>', preg_replace('/@(\w+)/', '<a href="'. url("profile/$1") . '">@$1</a>', $post->text)) !!}
      </p>

      <ul class="social_tools">
          @if(  $post->likes->where('user_id', Auth::id())->first()  )
            <li class="post like_icon"  id="{{$post->id}}" onclick="likePost({{$post->id}})"><i class="fa fa-fw  fa-heart "></i><span>{{(count($post->likes) > 0 ? count($post->likes) : '')}}</span></li>
          @else
            <li class="like_icon" id="{{$post->id}}" onclick="likePost({{$post->id}})"><i class="fa fa-fw fa-heart-o "></i> <span>{{(count($post->likes) > 0 ? count($post->likes) : '')}}</span></li>
          @endif
          <li class="comment_icon" onclick="sendCommentToPost({{$post->id}})"><i class="fa fa-fw  fa-comment-o "></i><span>{{(count($post->comments) > 0 ? count($post->comments) : '')}}</span></li>

      </ul >
    </div>

    <a href="{{url('profile/' . $post->user->username)}}" style="color:#292b2c; display:block;text-decoration:none">
      <div class="card-footer text-muted">
        <img src="{{ url('/img/uploads/avatars/' . $post->user->avatar)}}" class="user_avatar rounded-circle" style="height:36px;width:36px;">
        {{$post->user->username}} - <span class="small">{{$post->updated_at}}</span>
      </div>
    </a>

  </div>
</a>
</div>
