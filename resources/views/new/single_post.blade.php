@extends('new.app')

@section('content')

<div class="py-5 bg-light ">

  <div class="col-md-5 my-3 mx-auto">
    <div class="card">
      <a href="{{url('post/' . $post->id)}}" style="text-decoration:none;color:black">
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

        </ul>
      </div>
    </a>


      <a href="{{url('profile/' . $post->user->username)}}" style="color:#292b2c; display:block;text-decoration:none">
        <div class="card-footer text-muted">
          <img src="{{ url('/img/uploads/avatars/' . $post->user->avatar)}}" class="user_avatar rounded-circle">
          {{$post->user->username}} - <span class="small">{{$post->updated_at}}</span>
        </div>
      </a>
      <ul class="list-group list-group-flush">

      @foreach($post->comments as $comment)
       <li class="list-group-item">

            <a href="{{url('profile/' . $comment->user->username)}}" style="color:#292b2c; display:block;text-decoration:none">
              <h6>
              <img src="{{ url('/img/uploads/avatars/' . $comment->user->avatar)}}" class="user_avatar rounded-circle" />
              {{$comment->user->username}}
            </h6>
          </a>
           <p>{{$comment->text}}</p>
           <span class="small">{{$comment->updated_at}}</span>
         </li>
      @endforeach
    </ul>

    </div>
  </div>
</div>


@endsection
