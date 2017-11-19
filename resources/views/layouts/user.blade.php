

<div class="user_profile">
  <a href="{{url('profile/' . $user->username)}}">
  <div class="col span_12_of_12">
    <!-- -->
    <img src="{{ url('/img/uploads/avatars/' . $user->avatar)}}" class="user_avatar">
    <div class="user_card" style="">
      <h4>{{$user->username}}</h4>
      <span>{{$post->updated_at}}</span></div>
    <!-- <div class="col span_9_of_12">
      <div class="col span_6_of_12" style="padding:0px!important"><h4>{{ $user->username }}</h4></div>
      <div class="col col span_6_of_12"><p style="padding-top:16px;">{{$post->updated_at}}</p></div>
    </div> -->

  </div>

</a>

</div>
