
@extends('techmatters.app')

@section('title', $title)


@push('css')
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
@endpush

@section('content')

<form class="form-horizontal" method="POST" action="{{url('/articles/create')}}" enctype="multipart/form-data">
{{ csrf_field() }}
<div class="row mt-5">
  <div class="col-md-6">
    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}"> <label>Title</label>
      <input id="title" type="text" class="form-control" placeholder="Title" name="title"  required autofocus>

      @if ($errors->has('title'))
        <span class="help-block">
          <strong>{{ $errors->first('title') }}</strong>
        </span>
      @endif
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-group col-6">
        <img id="image-upload" class="img-fluid" src="http://via.placeholder.com/800x600"> <input type="file" style="display:none" id="file-upload" name="file" onchange="setThumb(event)">
        <p>Thumbnail image, this will also 'represent' your article image wise.</p>
    </div>
  </div>
</div>

<div class="standalone-container bg-light mt-5">



  <div id="toolbar-container">
  <span class="ql-formats">
  <button class="ql-bold"></button>
  <button class="ql-italic"></button>
  <button class="ql-underline"></button>
  <button class="ql-strike"></button>
  </span>
  <span class="ql-formats">
  <select class="ql-color"></select>
  <select class="ql-background"></select>
  </span>
  <span class="ql-formats">
  <button class="ql-script" value="sub"></button>
  <button class="ql-script" value="super"></button>
  </span>
  <span class="ql-formats">
  <button class="ql-header" value="1"></button>
  <button class="ql-header" value="2"></button>
  <button class="ql-blockquote"></button>
  <button class="ql-code-block"></button>
  </span>
  <span class="ql-formats"><button class="ql-list" value="ordered"></button>
  <button class="ql-list" value="bullet"></button>
  <button class="ql-indent" value="-1"></button>
  <button class="ql-indent" value="+1"></button>
  </span>
  <span class="ql-formats">
  <button class="ql-direction" value="rtl"></button>
  <select class="ql-align"></select>
  </span>
  <span class="ql-formats">
  <button class="ql-link"></button>
  <button class="ql-image"></button>
  <button class="ql-video"></button>
  <button class="ql-formula"></button>
  </span>
  <span class="ql-formats">
  <button class="ql-clean"></button>
  </span>
  </div>
  <div id="editor" >
    <p>Write your article..</p>
  </div>
</div>


<textarea name="text" id="article-text" style="display:none;"></textarea>

<button class="btn btn-primary pull-right">
  Post
</button>

</form>


@endsection


@push('scripts')


<!-- Include the Quill library -->
<script src="//cdnjs.cloudflare.com/ajax/libs/KaTeX/0.7.1/katex.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js"></script>
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

<!-- Initialize Quill editor -->
<script>
  var quill = new Quill('#editor', {
    modules: {
      formula: true,
      syntax: true,
      toolbar: '#toolbar-container'
    },
    placeholder: 'Compose an epic...',
    theme: 'snow'
  });



  $("form").submit(function(e){
    $("#article-text").text(quill.root.innerHTML);
    $(this).submit();
  });





</script>

@endpush
