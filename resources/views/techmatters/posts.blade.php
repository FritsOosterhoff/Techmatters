

@extends('techmatters.app')

@section('title', $title)


@section('content')



@if(!empty($posts))

<section class="col-md-8">



	@auth
	<div class="pt-3" id="create-post">


		@if (count($errors) > 0)
		<div class="alert alert-danger">
			<strong>Whoops!</strong> There were some problems with your input.<br><br>
			<ul>
				@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
		@endif
		<form class="form-horizontal" method="POST" action="{{url('/new_post')}}" enctype="multipart/form-data">
			{{ csrf_field() }}
			<div class="form-group">
				<textarea class="form-control" rows="5" name="text" placeholder="What are you thinking?"></textarea>
			</div>


			<div class="form-group tools">
				<!-- <img id="image-upload" class="img-fluid" src="{{url('/img/photo-camera.png')}}"> -->
				<a href="#" class="ml-2" id="image-upload" alt="flush all files">  <i class="fas fa-lg fa-camera"></i></a>
				<input type="file" style="display:none" id="file-upload" name="files[]" onchange="loadFile(event)" multiple="">
				<a href="#" class="ml-2" onclick="flushFiles()" alt="flush all files">  <i class="fas fa-lg fa-trash"></i></a>
				<button type="submit" class="btn btn-primary pull-right">
					Post
				</button>
				<div id="images-upload" class="row">

				</div>

			</div>
		</form>
	</div>
	@endauth


	@each('techmatters.post_each', $posts, 'post')


</section>


<section class="col-md-4 sidebar col float-right">
	@include('techmatters.sidebar')
</section>

<!-- -->


@endif
@endsection
