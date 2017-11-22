<div class="col span_3_of_12 item" id="{{$post->id}}">
  <div class="box" >
    @include('layouts.user', ['data' => $post])
    <div class="box-img">

<!-- 'img/uploads/' . url('/img/uploads/avatars/' . $user->avatar-->
      <img src="{{ (strpos($post->image, 'http')===false) ? url('/img/uploads/' . $post->image) : $post->image}}" />
    </div>
    <div class="box-content">


      {!! $post->text = preg_replace('/(?:^|\s)#(\w+)/',' <a href="'. url("tag/$1") . '">#$1</a>', preg_replace('/@(\w+)/', '<a href="'. url("profile/$1") . '">@$1</a>', $post->text)) !!}


      <br /></div>

      <div class="social_interactions">
        <ul>


          @if(  $post->likes->where('user_id', Auth::id())->first()  )
          <li class="like_icon"  id="{{$post->id}}" onclick="likePost({{$post->id}})"><i class="fa fa-fw  fa-heart "></i><span>{{(count($post->likes) > 0 ? count($post->likes) : '')}}</span></li>
          @else
          <li class="like_icon" id="{{$post->id}}" onclick="likePost({{$post->id}})"><i class="fa fa-fw fa-heart-o "></i> <span>{{(count($post->likes) > 0 ? count($post->likes) : '')}}</span></li>
          @endif
          <li class="comment_icon" onclick="sendCommentToPost({{$post->id}})"><i class="fa fa-fw  fa-comment-o "></i><span>{{(count($post->comments) > 0 ? count($post->comments) : '')}}</span></li>


          @if($post->user_id === Auth::id()) <!-- || Auth::id()===201 -->
          <li class="remove_icon fl-right" onclick="removePost({{$post->id}})"><i class="fa fa-fw  fa-trash-o "></i></li>
          @endif

      </ul></div>
    </div>
  </div>
