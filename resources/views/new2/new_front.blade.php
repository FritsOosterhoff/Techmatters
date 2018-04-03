
@extends('new.app')

@section('title', $title)


@section('content')

<style>
.gallery-wrapper {
  overflow: hidden;
}

.grid-item {
  padding-bottom: 3rem;
}

</style>



<div class="container-fluid">
  <div class="row" style="margin-top:5rem">

    <?php $start = array_slice($posts->all(), 0, 2) ?>
    <?php $continues = array_slice($posts->all(), 2) ?>


    <div class="col-md-12">
      <div class="gallery-wrapper clearfix">
        <div class="col-md-4 grid-sizer"></div>

        @foreach($posts as $post)

        <div class="col-md-4 grid-item">
          <a href="{{url('post/' . $post->id)}}">
            <img class="img-fluid" src="{{ (strpos($post->image, 'http')===false) ? url('/img/uploads/' . $post->image) : $post->image}}"/>
          </a>

          <div class="" style="position:absolute; top:5px;left:20px;color:white;">
            <a href="{{url('profile/' . $post->user->username)}}" style="text-decoration:none;color:white; font-weight:bold">
              <p>
                <img style="max-height:48px;" class="rounded-circle"  src="{{url('img/uploads/avatars/' . $post->user->avatar)}}"/>
                &nbsp;{{$post->user->username}}
              </p>
            </a>
          </div>
        </div>
        @endforeach

        <!--    @foreach($start as $post)

        <div class="col-md-4 grid-item">
        <a href="{{url('post/' . $post->id)}}">
        <img class="img-fluid" src="{{ (strpos($post->image, 'http')===false) ? url('/img/uploads/' . $post->image) : $post->image}}"/>
      </a>

      <div class="" style="position:absolute; top:5px;left:20px;color:white;">
      <a href="{{url('profile/' . $post->user->username)}}" style="text-decoration:none;color:white; font-weight:bold">
      <p>
      <img style="max-height:48px;" class="rounded-circle"  src="{{url('img/uploads/avatars/' . $post->user->avatar)}}"/>
      &nbsp;{{$post->user->username}}
    </p>
  </a>
</div>

</div>
@endforeach



@foreach ($continues as $post)
<div class="col-md-4 grid-item">
<a href="{{url('post/' . $post->id)}}">
<img class="img-fluid" src="{{ (strpos($post->image, 'http')===false) ? url('/img/uploads/' . $post->image) : $post->image}}"/>
</a>
<div class="" style="position:absolute; top:5px;left:20px;color:white;">
<a href="{{url('profile/' . $post->user->username)}}" style="text-decoration:none;color:white; font-weight:bold">

<p>
<img style="max-height:48px;" class="rounded-circle"  src="{{url('img/uploads/avatars/' . $post->user->avatar)}}"/>
&nbsp;{{$post->user->username}}
</p>
</a>
</div>
</div>
@endforeach
-->

</div>

</div>
</div>
</div>



@endsection
