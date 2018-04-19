


@extends('techmatters.app')

@section('title', "About")


@section('sidebar_element')


<div class="card text-center p-2 mb-5">
  <img class="card-img-top mx-auto d-block rounded-circle" style="max-width:150px;" src="{{url('img/uploads/avatars/' . $user->avatar)}}" alt="Card image cap">
  <div class="card-block">
    <h4 class="card-title">{{$user->name}}</h4>

    <b class="small">@ {{$user->username}}</b>
    <p class="card-text">{{$user->biography}}</p>
  </div>
  <div class="row py-2">
    <div class="col-6 text-center">
      {{$user->follower_count()[0]->followers}}  Followers
    </div>
    <div class=" col-6  text-center">
      {{count($user->follows)}} Follows
    </div>
  </div>

  @if(Auth::id()!==$user->id)

    <div>
      <hr>
    </div>
  <div class="card-block text-center pb-3 social-toolbox">
    <ul class="social-toolbox">
      @if(Auth::user()->follow_person($user->id))
      <li class="unfollow-icon mr-3"><i class="fa fa-lg fa-heart" id="{{$user->id}}" onclick="unfollowUser(this.id)"></i></li>
      @else
      <li class="follow-icon mr-3"><i class="fa fa-lg fa-heart-o" id="{{$user->id}}" onclick="followUser(this.id)"></i></li>
      @endif

      <li class="comment-icon"><i class="fa fa-lg fa-comment-o"></i> </li>
    </ul>
  </div>
  @endif
</div>
@endsection

@section('content')


<section class="col-md-8">



<ul id="tabsJustified" class="nav nav-tabs">
  <li class="nav-item"><a href="" data-target="#home1" data-toggle="tab" class="nav-link  ">Home</a></li>
  <li class="nav-item"><a href="" data-target="#profile1" data-toggle="tab" class="nav-link   active">Profile</a></li>
  <li class="nav-item"><a href="" data-target="#messages1" data-toggle="tab" class="nav-link  ">Messages</a></li>
</ul>
<div id="tabsJustifiedContent" class="tab-content">
  <div id="home1" class="tab-pane fade">
    <div class="list-group"><a href="" class="list-group-item d-inline-block"><span class="float-right badge badge-pill badge-dark">51</span> Home Link</a> <a href="" class="list-group-item d-inline-block"><span class="float-right badge badge-pill badge-dark">8</span> Link 2</a>              <a href="" class="list-group-item d-inline-block"><span class="float-right badge badge-pill badge-dark">23</span> Link 3</a> <a href="" class="list-group-item d-inline-block text-muted">Link n..</a></div>
  </div>
  <div id="profile1" class="tab-pane fade active show">
    <div class="row pb-2">
      <div class="col-md-7">
        <p>Tabs can be used to contain a variety of content &amp; elements. They are a good way to group <a href="" class="link">relevant content</a>. Display initial content in context to the user. Enable the user to flow through
          <a href="" class="link">more</a> information as needed.
        </p>
      </div>
      <div class="col-md-5"><img src="https://social.fritsoosterhoff.nl/img/uploads/images/4.jpg" class="float-right img-fluid img-rounded"></div>
    </div>
  </div>
  <div id="messages1" class="tab-pane fade">
    <div class="list-group"><a href="" class="list-group-item d-inline-block"><span class="float-right badge badge-pill badge-dark">44</span> Message 1</a> <a href="" class="list-group-item d-inline-block"><span class="float-right badge badge-pill badge-dark">8</span> Message 2</a>              <a href="" class="list-group-item d-inline-block"><span class="float-right badge badge-pill badge-dark">23</span> Message 3</a> <a href="" class="list-group-item d-inline-block text-muted">Message n..</a></div>
  </div>
</div>


@if(!empty($posts) )


@each('techmatters.post_each', $posts, 'post')


@endif

</section>
<section class="col-md-4 sidebar col float-right">
  @include('techmatters.sidebar')
</section>
@endsection
