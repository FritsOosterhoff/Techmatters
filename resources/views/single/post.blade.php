@extends('layouts.app')


@section('content')


<div class="center span_6_of_12">

    <div class="box" style="padding:0px 30px 30px 30px; margin-top:20px;">
@include('layouts.user', ['data' => $post])
        <div class="box-img">
          <img src="{{ (strpos($post->image, 'http')===false) ? url('/img/uploads/' . $post->image) : $post->image}}" />

        </div>
        <div class="box-content">
          <p>{!! $post->text = preg_replace('/(?:^|\s)#(\w+)/',' <a href="'. url("tag/$1") . '">#$1</a>', preg_replace('/@(\w+)/', '<a href="'. url("profile/$1") . '">@$1</a>', $post->text)) !!}</p>

          <hr>
        </div>





    <div class="comments">

        @each('layouts.comment', $post->comments, 'comment')

    </div>

</div>
</div>
<!--
<div class="user_profile">
  <a href="{{url('profile/' . $post->username)}}">
  <div class="col span_12_of_12">
    <!--
    <div class="user_card" style="">
    </div>
    <!-- <div class="col span_9_of_12">
      <div class="col span_6_of_12" style="padding:0px!important"><h4>{{ $post->username }}</h4></div>
      <div class="col col span_6_of_12"><p style="padding-top:16px;">{{$post->updated_at}}</p></div>
    </div>
    <p>{{$post->text}}</p>
  </div>

</a>

</div>

-->
@endsection
