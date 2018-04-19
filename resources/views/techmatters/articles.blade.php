

@extends('techmatters.app')

@section('title', $title)


@section('content')


<section class="col-md-8">

@if(!empty($articles))

<div class="articles-content mt-2 white-bg">
  <h2>Latest news</h2>
  <hr>
  @each('techmatters.article_each', $articles, 'article')
</div>

@endif

</section>

<section class="col-md-4 sidebar col float-right">
  @include('techmatters.sidebar')
</section>

@endsection
