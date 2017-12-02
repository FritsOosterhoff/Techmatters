

<div class="col-md-4 my-3">
  <div class="card">
    <img class="img-fluid" src="{{ (strpos($post->image, 'http')===false) ? url('/img/uploads/' . $post->image) : $post->image}}" alt="Card image">
    <div class="card-body">
      <p class="card-text p-y-1">
        {!! $post->text = preg_replace('/(?:^|\s)#(\w+)/',' <a href="'. url("tag/$1") . '">#$1</a>', preg_replace('/@(\w+)/', '<a href="'. url("profile/$1") . '">@$1</a>', $post->text)) !!}
      </p>
    </div>

    <a href="{{url('profile/' . $post->user->username)}}" style="color:#292b2c; display:block;text-decoration:none">
      <div class="card-footer text-muted">
        <img src="{{ url('/img/uploads/avatars/' . $post->user->avatar)}}" class="user_avatar rounded-circle" style="height:36px;width:36px;">
        {{$post->user->username}} - <span class="small">{{$post->updated_at}}</span>
      </div>
    </a>

  </div>
</div>
