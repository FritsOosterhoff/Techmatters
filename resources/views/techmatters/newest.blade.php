

@extends('techmatters.app')

@section('title', $title)


@section('content')



@if(!empty($posts))


<section class="recent-activity py-5">

	<div class="container">
		<h2 class="text-center ">{{$title}}</h2>
		<div class="row">

			<div class="col-md-8">
        @each('techmatters.post_each', $posts, 'post')
        <!-- col-md-8 -->
      </div>

      <div class="col-md-4">

        <div class="card mt-5">
          <div class="card-header">
            Recent Photos
          </div>

          <div class="card-body">
            <div class="row">
                      @foreach($media as $image)
                      <div class="col-4 py-3">
                        <a href="{{url('post/' . $image->id)}}">
                          <img src="{{ (strpos($image->image, 'http')===false) ? url('public/img/uploads/images/' . $image->image) : $image->image}}" class="img-fluid"> </a>
                      </div>

                    @endforeach
            </div>
          </div>
        </div>
        <!-- col-md-4 -->
      </div>

      <!-- row -->
    </div>

    <!-- container -->
  </div>

</section>


<!-- -->


	@endif
@endsection
