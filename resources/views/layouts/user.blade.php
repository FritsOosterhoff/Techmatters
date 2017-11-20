

<div class="user_profile">
  <a href="{{url('profile/' . $data->user->username)}}">
  <div class="col span_12_of_12">
    <!-- -->
    <img src="{{ url('/img/uploads/avatars/' . $data->user->avatar)}}" class="user_avatar">
    <div class="user_card" style="">
      <h4>{{$data->user->username}}</h4>
      <span>{{$data->updated_at}}</span></div>


  </div>

</a>

</div>
