<div class="card mt-5 ">

  <div class="user p-2">
    <img class="avatar rounded-circle" src="{{url('img/uploads/avatars/' . $post->user->avatar)}}" />
    <div class="details">
      <a href="{{url('profile') . '/' . $post->user->username}}" class="d-block text-dark">
        <b> {{$post->user->username}}</b>
        <p class="small"><span>{{$post->updated_at}}</span></p>
      </a>
    </div>
  </div>
  <a class="text-dark" href="{{url('post/' . $post->id)}}">
    <div class="card-body">
      <!-- <a href="#" style="width:100%;height:100%;display:block; position:absolute; z-index:1;padding:0px;"></a> -->
      <!-- <h5 class="card-title">Card title that wraps to a new line</h5> -->
      <p class="card-text">{{$post->text}}</p>

    </div>

    @if(!empty(unserialize($post->image)))
    <div class="images ">
      <?php
        $images = unserialize($post->image);

        $path = unserialize($post->image)[0];
       ?>

       @if(count($images) === 1)
         <img src="{{url('img/uploads/images/' . $path)}}" class="img-fluid">
       @elseif(count($images) > 1 && count($images) ===2)
         <img src="{{url('img/uploads/images/' . $images[0])}}" class="img-fluid post-image col-6">
         <img src="{{url('img/uploads/images/' . $images[1])}}" class="img-fluid post-image col-6">
       @elseif(count($images) > 2 && count($images) === 3)
         <img src="{{url('img/uploads/images/' . $images[0])}}" class="img-fluid post-image col-12">
         <img src="{{url('img/uploads/images/' . $images[1])}}" class="img-fluid post-image col-6">
         <img src="{{url('img/uploads/images/' . $images[2])}}" class="img-fluid post-image col-6">
       @endif
       <!--
      <img src="{{url('img/uploads/images/' . $path)}}" class="img-fluid">
      <img src="https://social.fritsoosterhoff.nl/img/uploads/images/23.jpg" class="img-fluid post-image col-4">
      <img src="https://social.fritsoosterhoff.nl/img/uploads/images/6.jpg" class="img-fluid post-image col-4">
      <img src="https://social.fritsoosterhoff.nl/img/uploads/images/4.jpg" class="img-fluid post-image col-4" > -->

    </div>
    @endif

  </a>

  <div class="card-footer">
    <div class="social-toolbox">
      <ul class="socials " style=" float: right;  padding:0px; margin:0px;">
        @if(  $post->likes->where('user_id', Auth::id())->first()  )
        <li class="like_icon" id="{{$post->id}}" onclick="likePost(this.id)"><i class="fa fa-fw fa-heart "></i> <span>{{$post->likes->count() }}</span></li>
        @else
        <li class="like_icon" id="{{$post->id}}" onclick="likePost(this.id)"><i class="fa fa-fw fa-heart-o "></i> <span>{{$post->likes->count() }}</span></li>
        @endif
      </ul>
    </div>
  </div>
</div>
