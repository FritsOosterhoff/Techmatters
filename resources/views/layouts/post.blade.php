<div class="col span_3_of_12">
  <div class="box" >
    @include('layouts.user', ['user' => $post->user])
    <div class="box-img">

<!-- 'img/uploads/' . url('/img/uploads/avatars/' . $user->avatar-->
      <img src="{{ (strpos($post->image, 'http')===false) ? url('/img/uploads/' . $post->image) : $post->image}}" />
    </div>
    <div class="box-content">

      {{$post->text}}<br /></div>

      <div class="social_interactions">
        <ul>


          @if(  $post->likes->where('user_id', Auth::id())->first()  )
          <li class="like_icon"><i class="fa fa-fw fa-lg fa-heart "></i>{{count($post->likes)}}</li>
          @else
          <li class="like_icon" id="{{$post->id}}" onclick="likePost({{$post->id}})"><i class="fa fa-fw fa-lg fa-heart-o "></i><span>{{count($post->likes)}}</span></li>
          @endif
          <li class="comment_icon" onclick="sendCommentToPost({{$post->id}})"><i class="fa fa-fw fa-lg fa-comment-o "></i><span>{{count($post->likes)}}</span></li>
          <li class="fl-right"><i class="fa fa-fw fa-lg fa-trash-o "></i></li>

      </ul></div>
    </div>
  </div>
