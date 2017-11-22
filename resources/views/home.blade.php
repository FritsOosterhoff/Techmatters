@extends('layouts.app')

@section('content')


@if(!empty($posts))


<div class="section group">
	<h1 class="page-heading">{{$title}}</h1>
	@each('layouts.post', $posts->all(), 'post')
</div>

<div class="section group">
	<div id="paginate-container" class="center">
		{{$posts->links()}}
	</div>
</div>

@endif

@endsection
