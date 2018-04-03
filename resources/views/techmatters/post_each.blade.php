<div class="card mt-5 ">

  <div class="user p-2">
    <img class="avatar rounded-circle" src="{{url('img/uploads/avatars/' . $post->user->avatar)}}" />
    <div class="details">
      <b> {{$post->user->username}}</b>
      <p class="small"><span>{{$post->updated_at}}</span></p>
    </div>
  </div>
  <a class="text-dark" href="{{url('post/' . $post->id)}}">
    <div class="card-body">
      <!-- <a href="#" style="width:100%;height:100%;display:block; position:absolute; z-index:1;padding:0px;"></a> -->
      <!-- <h5 class="card-title">Card title that wraps to a new line</h5> -->
      <p class="card-text">{{$post->text}}</p>

    </div>

    <div class="images ">
      <img src="{{url('img/uploads/images/' . $post->image)}}" class="img-fluid">
      <img src="https://social.fritsoosterhoff.nl/img/uploads/images/23.jpg" class="img-fluid post-image col-4">
      <img src="https://social.fritsoosterhoff.nl/img/uploads/images/6.jpg" class="img-fluid post-image col-4">
      <img src="https://social.fritsoosterhoff.nl/img/uploads/images/4.jpg" class="img-fluid post-image col-4" >
    </div>
  </a>


  <div class="card-footer">
    <div class="social-toolbox">
      <ul class="socials " style=" float: right;  padding:0px; margin:0px;">
        <li class="like_icon" id="3" onclick="likePost(3)"><i class="fa fa-fw fa-heart-o "></i> <span>{{$post->likes->count() }}</span></li>
      </ul>
    </div>
  </div>
</div>
