@extends('techmatters.app')

@section('content')

<div class="py-5  ">

  <div class="col-md-8 my-3">

    @include('techmatters.post_each', ['post'])


      <div class="comments py-5">
        <h3 class="text-center mb-5">Comments</h3>
        <div class="row">
          <div class="col-md-12 comment">

            <form class="form-horizontal" method="POST" action="{{url('/comment')}}" enctype="multipart/form-data">
              <input type="hidden" name="_token" value="Z7a0Hz7mXdbbP5MOsNqoWQdiOyJncH35oY17vFph">
              <input type="hidden" name="post" value="{{$post->id}}">
              <div class="form-group">
                <textarea style="background:#eff1f5; padding:10px;" class="form-control" rows="5" name="text" placeholder="What are you thinking?"></textarea>
              </div>

              <div class="form-group">
                <button type="submit" class="btn button-primary pull-right">
                  Post
                </button>
              </div>
            </form>
          </div>
        </div>

        @foreach($post->comments as $comment)
        <div class="col-md-12 comment">

          <div class="user p-2">
            <img class="avatar rounded-circle" src="{{url('img/uploads/avatars/' . $comment->user->avatar)}}" />
            <div class="details">
              <b> {{$comment->user->username}}</b>
              <p class="small"><span>{{$comment->updated_at}}</span></p>
            </div>
          </div>
          <div class="col-md-8">
            <p class=" rounded" style="background:#eff1f5; padding:10px;">
              {{$comment->text}}
            </p>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>



  @endsection
