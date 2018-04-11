
@extends('layouts.app')

@section('title', $title)


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
eoahsduhasds
@endif

@endsection
