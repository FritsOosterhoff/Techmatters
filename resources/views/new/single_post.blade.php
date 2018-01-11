@extends('new.app')

@section('content')

<div class="py-5  ">

  <div class="col-md-7 my-3 mx-auto">
    <div class="card">

      <img class="img-fluid" src="{{ (strpos($post->image, 'http')===false) ? url('/img/uploads/' . $post->image) : $post->image}}" alt="Card image">
      <div class="card-body">
        <div class="row" style="margin:0px">
          <div class="col-md-8">
            <a href="{{url('profile/' . $post->user->username)}}" style="color:#292b2c;display:block;text-decoration:none;width: auto;display: inline-block;">
              <img src="{{url('img/uploads/avatars/' . $post->user->avatar)}}" class="user_avatar rounded-circle" style="float:left;margin-right:10px;">
              <div style= "float:left;" ><b>{{$post->user->username}}</b>
                <p class="small" style="margin:0;"> {{$post->updated_at}} </p></div>
              </a>
            </div>
            <div class="col-md-4 ml-auto">
              <ul class="social_tools" style="overflow:hidden; float:right">
                @if(  $post->likes->where('user_id', Auth::id())->first()  )
                <li class="post like_icon"  id="{{$post->id}}" onclick="likePost({{$post->id}})"><i class="fa fa-fw  fa-heart "></i><span>{{(count($post->likes) > 0 ? count($post->likes) : '')}}</span></li>
                @else
                <li class="like_icon" id="{{$post->id}}" onclick="likePost({{$post->id}})"><i class="fa fa-fw fa-heart-o "></i> <span>{{(count($post->likes) > 0 ? count($post->likes) : '')}}</span></li>
                @endif
                <li class="comment_icon" onclick="sendCommentToPost({{$post->id}})"><i class="fa fa-fw  fa-comment-o "></i><span>{{(count($post->comments) > 0 ? count($post->comments) : '')}}</span></li>

              </ul>
            </div>
          </div>
          <p class="card-text p-y-1">
            {!! $post->text = preg_replace('/(?:^|\s)#(\w+)/',' <a href="'. url("tag/$1") . '">#$1</a>', preg_replace('/@(\w+)/', '<a href="'. url("profile/$1") . '">@$1</a>', $post->text)) !!}
          </p>


        </div>
      </div>



      <div class="comments py-5">
        <h3 class="text-center mb-5">Comments</h3>
        <div class="row">
          <div class="col-md-12 comment">

            <form class="form-horizontal" method="POST" action="{{url('/comment')}}" enctype="multipart/form-data">
              <input type="hidden" name="_token" value="Z7a0Hz7mXdbbP5MOsNqoWQdiOyJncH35oY17vFph">
              <input type="hidden" name="post" value="{{$post->id}}">
              <div class="form-group">
                <textarea style="background:#eff1f5; padding:10px;" class="form-control" rows="5" name="text" placeholder="What are you thinking?"></textarea>
              </div>

              <div class="form-group">
                <button type="submit" class="btn button-primary pull-right">
                  Post
                </button>
              </div>
            </form>
          </div>
        </div>

        @foreach($post->comments as $comment)
        <div class="col-md-12 comment">
          <div>
            <a href="{{url('profile/' . $comment->user->username)}}" style="color:#292b2c;display:block;text-decoration:none;width: auto;display: inline-block;">
              <img src="{{url('img/uploads/avatars/' . $comment->user->avatar)}}" class="user_avatar rounded-circle" style="float:left;margin-right:10px;"/>
              <div style= "float:left;" ><b>{{$comment->user->username}}</b>
                <p class="small" style="margin:0;"> {{$comment->updated_at}} </p>
              </div>
            </a>
          </div>
          <div class="col-md-8">
            <p class=" rounded" style="background:#eff1f5; padding:10px;">
              {{$comment->text}}
            </p>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>



  @endsection
