
@extends('techmatters.app')

@section('title', $title)

@section('jumbotron')

<!--Jumbotron-->
<div class="jumbotron text-center mt-5 ">

	<div class="container">
		<!--Title-->
		<h1 class="card-title h2-responsive mt-2"><strong>Techmatters.nl</strong></h1>
		<!--Subtitle-->
		<p class="mb-4 font-bold">A laravel powered Social network</p>

		<!--Text-->
		<div class="d-flex justify-content-center">
			<p class="card-text mb-3" style="max-width: 43rem;">Techmatters is a project maintained by Frits Oosterhoff. This project is NOT supposed to be used as an actual social network, this project is only a placeholder. The data it contains is only used as place holder data.

			</p>
		</div>

		<hr class="my-4">

		<button type="button" class="btn btn-blue ">Github<span class="fa fa-github ml-1"></span></button>
		<button type="button" class="btn btn-outline-primary">Sign in <i class="fas fa-sign-in-alt ml-1"></i></button>
	</div>

</div>
<!--Jumbotron-->

@endsection

@section('content')




@if(!empty($posts))


<section class="recent-activity ">

	<div class="container">
		<h2 class="text-center mb-2 ">{{$title}}</h2>
		<div class="row">

			<div class="col-md-8">



				<div class="card">

					<div class="user p-2">
						<img class="avatar rounded-circle" src="https://social.fritsoosterhoff.nl/img/uploads/avatars/10.jpg" />
						<div class="details">
							<b> Andres fushigi </b>
							<p class="small"><span>ajsdhajushd</span></p>
						</div>
					</div>

					<div class="card-body">
						<!-- <h5 class="card-title">Card title that wraps to a new line</h5> -->
						<p class="card-text">It FINALLY happened! Now i have a more serious looking design for social and techmatters</p>

					</div>

					<div class="images ">
						<img src="https://social.fritsoosterhoff.nl/img/uploads/images/12.jpg" class="img-fluid">
						<img src="https://social.fritsoosterhoff.nl/img/uploads/images/23.jpg" class="img-fluid post-image col-4">
						<img src="https://social.fritsoosterhoff.nl/img/uploads/images/6.jpg" class="img-fluid post-image col-4">
						<img src="https://social.fritsoosterhoff.nl/img/uploads/images/4.jpg" class="img-fluid post-image col-4" >
					</div>




					<div class="card-footer">
						<ul class="social_tools" style=" float: right;  padding:0px; margin:0px;">
							<li class="like_icon" id="3" onclick="likePost(3)"><i class="fa fa-fw fa-heart-o "></i> <span></span></li>
						</ul>
					</div>
				</div>
				<!-- main column left -->
			</div>

			@include('techmatters.sidebar')

			</div>



		</div>

		@endif
		@endsection

		<script>
		</script>
