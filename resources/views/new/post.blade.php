
<div class="col-md-4 my-3">
  <div class="card">

    <div style="padding:10px;">
      <a href="{{url('profile/' . $post->user->username)}}" style="color:#292b2c;display:block;text-decoration:none;width: auto;display: inline-block;">
            <img src="{{url('img/uploads/avatars/' . $post->user->avatar)}}" class="user_avatar rounded-circle" style="float:left;margin-right:10px;">
            <div style= "float:left;" >{{$post->user->username}}
            <p class="small" style="margin:0;"> {{$post->updated_at}} </p></div>
      </a>

    </div>
    <a href="{{url('post/' . $post->id)}}" style="text-decoration:none;color:black">

    <img class="img-fluid" src="{{ (strpos($post->image, 'http')===false) ? url('/img/uploads/' . $post->image) : $post->image}}" alt="Card image">
    <div class="card-body">
      <p class="card-text p-y-1">
        {!! $post->text = preg_replace('/(?:^|\s)#(\w+)/',' <a href="'. url("tag/$1") . '">#$1</a>', preg_replace('/@(\w+)/', '<a href="'. url("profile/$1") . '">@$1</a>', $post->text)) !!}
      </p>

    </a>

    </div>

<div class="card-footer">
  
      <ul class="social_tools" style=" float: right;  padding:0px; margin:0px;">


          @if(  $post->likes->where('user_id', Auth::id())->first()  )
            <li class="like_icon" id="{{$post->id}}" onclick="likePost({{$post->id}})"><i class="fa fa-fw fa-heart "></i> <span>{{(count($post->likes) > 0 ? count($post->likes) : '')}}</span></li>
          @else
           <li class="like_icon" id="{{$post->id}}" onclick="likePost({{$post->id}})"><i class="fa fa-fw fa-heart-o "></i> <span>{{(count($post->likes) > 0 ? count($post->likes) : '')}}</span></li>
           @endif
           <!-- <li class="comment_icon" onclick="sendCommentToPost({{$post->id}})"><i class="fa fa-fw  fa-comment-o "></i><span>{{(count($post->comments) > 0 ? count($post->comments) : '')}}</span></li> -->

      </ul>


<!-- </div> -->

  </div>
</div>
</div>
