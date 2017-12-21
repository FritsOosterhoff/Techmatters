@extends('new.app')

@section('content')

<div class="py-5 bg-light ">

  <div class="col-md-7 my-3 mx-auto">
    <div class="card">

      <img class="img-fluid" src="{{ (strpos($post->image, 'http')===false) ? url('/img/uploads/' . $post->image) : $post->image}}" alt="Card image">
      <div class="card-body">
        <p class="card-text p-y-1">
          {!! $post->text = preg_replace('/(?:^|\s)#(\w+)/',' <a href="'. url("tag/$1") . '">#$1</a>', preg_replace('/@(\w+)/', '<a href="'. url("profile/$1") . '">@$1</a>', $post->text)) !!}
        </p>


      </div>



    <div class="row" style="margin:0px">
      <div class="col-md-4">
        <a href="{{url('profile/' . $post->user->username)}}" style="color:#292b2c;display:block;text-decoration:none;width: auto;display: inline-block;">
              <img src="{{url('img/uploads/avatars/' . $post->user->avatar)}}" class="user_avatar rounded-circle" style="float:left;margin-right:10px;">
              <div style= "float:left;" >{{$post->user->username}}
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
      <ul class="list-group list-group-flush">
      <li class="list-group-item">
        <form class="form-horizontal" method="POST" action="add_comment" enctype="multipart/form-data">
          {{ csrf_field() }}
          <input type="hidden" name="post" value="{{$post->id}}" />
          <div class="form-group">
            <textarea class="form-control" rows="5" name="text" placeholder="What are you thinking?"></textarea>
          </div>


          <div class="form-group">
            <img id="image-upload" class="img-fluid" src="{{url('/img/photo-camera.png')}}"> <input type="file" style="display:none" id="file-upload" name="file" onchange="loadFile(event)">
            <button type="submit" class="btn button-primary pull-right">
              Post
            </button>
          </div>
        </form>
      </li>
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
