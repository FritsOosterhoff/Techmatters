

<div class="col-md-4 my-3">
  <div class="card">
    <a href="{{url('post/' . $post->id)}}" style="text-decoration:none;color:black">

    <img class="img-fluid" src="{{ (strpos($post->image, 'http')===false) ? url('/img/uploads/' . $post->image) : $post->image}}" alt="Card image">
    <div class="card-body">
      <p class="card-text p-y-1">
        {!! $post->text = preg_replace('/(?:^|\s)#(\w+)/',' <a href="'. url("tag/$1") . '">#$1</a>', preg_replace('/@(\w+)/', '<a href="'. url("profile/$1") . '">@$1</a>', $post->text)) !!}
      </p>



      <!--
      <div class="card-footer text-muted">
            <a href="http://social.fritsoosterhoff.nl/profile/ImAtWar" style="color:#292b2c;display:block;text-decoration:none;width: auto;display: inline-block;">
                  <img src="http://social.fritsoosterhoff.nl/img/uploads/avatars/d1dac352723263aedc867681abb94fbe.jpg" class="user_avatar rounded-circle">
                  ImAtWar - <span class="small">2017-12-01 08:12:52</span>
            </a>
              <ul class="social_tools" style="float: right;">
				<li class="like_icon" id="501" onclick="likePost(501)"><i class="fa fa-fw fa-heart-o "></i> <span>5</span></li>
				<li class="comment_icon" onclick="sendCommentToPost(501)"><i class="fa fa-fw  fa-comment-o "></i><span>1</span></li>
			  </ul>
</div>

      -->
    </a>

    </div>

    <div class="card-footer text-muted">
      <a href="{{url('profile/' . $post->user->username)}}" style="color:#292b2c;display:block;text-decoration:none;width: auto;display: inline-block;">
            <img src="{{url('img/uploads/avatars/' . $post->user->avatar)}}" class="user_avatar rounded-circle" style="float:left;margin-right:10px;">
            <div style= "float:left;" >{{$post->user->username}}
            <p class="small" style=""> {{$post->updated_at}} </p></div>
      </a>
      <ul class="social_tools" style=" float: right;  padding:0px">


          @if(  $post->likes->where('user_id', Auth::id())->first()  )
            <li class="like_icon" id="501" onclick="likePost(501)"><i class="fa fa-fw fa-heart-o "></i> <span>5</span></li>
          @else
           <li class="like_icon" id="{{$post->id}}" onclick="likePost({{$post->id}})"><i class="fa fa-fw fa-heart-o "></i> <span>{{(count($post->likes) > 0 ? count($post->likes) : '')}}</span></li>
           @endif
           <li class="comment_icon" onclick="sendCommentToPost({{$post->id}})"><i class="fa fa-fw  fa-comment-o "></i><span>{{(count($post->comments) > 0 ? count($post->comments) : '')}}</span></li>

      </ul>


</div>

  </div>
</div>
