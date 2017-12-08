
@extends('new.app')

@section('title', $title)


@section('content')


<div class="py-5 text-center opaque-overlay" style="background-image: url(&quot;{{url('img/banner.jpg')}}&quot;);">
	<div class="container py-5">
		<div class="row">
			<div class="col-md-12 text-white">
				<h1 class="display-3 mb-4">Foo.social</h1>
				@if(Auth::guest())
				<a href="{{url('login')}}" class="btn btn-lg mx-1 btn-light">Sign in</a>
				<a href="{{url('register')}}" class="btn btn-lg btn-primary mx-1">Register</a>
				@endif
			</div>
		</div>
	</div>
</div>

<div class="py-5 bg-light text-dark">

	<div class="container">


		@foreach (array_chunk($posts->all(), 3) as $post)
		  <div class="row">
	    	@each('new.post', $post, 'post')
			</div>
		@endforeach
	</div>
</div>




  <div class="py-5 bg-secondary">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <h1 class="text-center mb-5 text-white">Recent photos</h1>
        </div>
      </div>
      <div class="row">

				@foreach($media as $image)
        <div class="p-0 col-md-2 col-6">
          <a href="{{url('post/' . $image->id)}}">
            <img src="{{ (strpos($image->image, 'http')===false) ? url('/img/uploads/' . $image->image) : $image->image}}" class="img-fluid"> </a>
        </div>

			@endforeach
    </div>
  </div>
</div>
@endsection
