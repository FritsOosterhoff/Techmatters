
@extends('techmatters.app')

@section('title', $title)


@push('css')
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
@endpush

@section('content')

<form class="form-horizontal" method="POST" action="{{url('/articles/create')}}" enctype="multipart/form-data">

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
  <div id="editor">
    <p>Lorem ipsum dolor sit amet, cum et altera commune consulatu. Everti nostrud ius eu, omittam luptatum voluptatibus at pro. Adhuc falli essent ex per. Per dolore graeco atomorum in, ex modus officiis vituperatoribus est. In omittam evertitur ius, ius te error omnes mediocrem. Et has omnes decore, option aliquip dissentiet cum ne.</p><p><br></p><p><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAA4QAAAJYCAIAAAC1p7+MAAALZUlEQVR4nO3WsQ2CUAAAUWAMLQiUNnRWbmDBEu6/AYkL2N9PfG+CK2+e1/cEvyy3rU5gUNf+qBMY1Od1rxMY1Pk86gQGtdQBAAD8LzMKAEDGjAIAkDGjAABkzCgAABkzCgBAxowCAJAxowAAZMwoAAAZMwoAQMaMAgCQMaMAAGTMKAAAGTMKAEDGjAIAkDGjAABkzCgAABkzCgBAxowCAJAxowAAZMwoAAAZMwoAQMaMAgCQMaMAAGTMKAAAGTMKAEDGjAIAkDGjAABkzCgAABkzCgBAxowCAJAxowAAZMwoAAAZMwoAQMaMAgCQMaMAAGTMKAAAGTMKAEDGjAIAkDGjAABkzCgAABkzCgBAxowCAJAxowAAZMwoAAAZMwoAQMaMAgCQMaMAAGTMKAAAGTMKAEDGjAIAkDGjAABkzCgAABkzCgBAxowCAJAxowAAZMwoAAAZMwoAQMaMAgCQMaMAAGTMKAAAGTMKAEDGjAIAkDGjAABkzCgAABkzCgBAxowCAJAxowAAZMwoAAAZMwoAQMaMAgCQMaMAAGTMKAAAGTMKAEDGjAIAkDGjAABkzCgAABkzCgBAxowCAJAxowAAZMwoAAAZMwoAQMaMAgCQMaMAAGTMKAAAGTMKAEDGjAIAkDGjAABkzCgAABkzCgBAxowCAJAxowAAZMwoAAAZMwoAQMaMAgCQMaMAAGTMKAAAGTMKAEDGjAIAkDGjAABkzCgAABkzCgBAxowCAJAxowAAZMwoAAAZMwoAQMaMAgCQMaMAAGTMKAAAGTMKAEDGjAIAkDGjAABkzCgAABkzCgBAxowCAJAxowAAZMwoAAAZMwoAQMaMAgCQMaMAAGTMKAAAGTMKAEDGjAIAkDGjAABkzCgAABkzCgBAxowCAJAxowAAZMwoAAAZMwoAQMaMAgCQMaMAAGTMKAAAGTMKAEDGjAIAkDGjAABkzCgAABkzCgBAxowCAJAxowAAZMwoAAAZMwoAQMaMAgCQMaMAAGTMKAAAGTMKAEDGjAIAkDGjAABkzCgAABkzCgBAxowCAJAxowAAZMwoAAAZMwoAQMaMAgCQMaMAAGTMKAAAGTMKAEDGjAIAkDGjAABkzCgAABkzCgBAxowCAJAxowAAZMwoAAAZMwoAQMaMAgCQMaMAAGTMKAAAGTMKAEDGjAIAkDGjAABkzCgAABkzCgBAxowCAJAxowAAZMwoAAAZMwoAQMaMAgCQMaMAAGTMKAAAGTMKAEDGjAIAkDGjAABkzCgAABkzCgBAxowCAJAxowAAZMwoAAAZMwoAQMaMAgCQMaMAAGTMKAAAGTMKAEDGjAIAkDGjAABkzCgAABkzCgBAxowCAJAxowAAZMwoAAAZMwoAQMaMAgCQMaMAAGTMKAAAGTMKAEDGjAIAkDGjAABkzCgAABkzCgBAxowCAJAxowAAZMwoAAAZMwoAQMaMAgCQMaMAAGTMKAAAGTMKAEDGjAIAkDGjAABkzCgAABkzCgBAxowCAJAxowAAZMwoAAAZMwoAQMaMAgCQMaMAAGTMKAAAGTMKAEDGjAIAkDGjAABkzCgAABkzCgBAxowCAJAxowAAZMwoAAAZMwoAQMaMAgCQMaMAAGTMKAAAGTMKAEDGjAIAkDGjAABkzCgAABkzCgBAxowCAJAxowAAZMwoAAAZMwoAQMaMAgCQMaMAAGTMKAAAGTMKAEDGjAIAkDGjAABkzCgAABkzCgBAxowCAJAxowAAZMwoAAAZMwoAQMaMAgCQMaMAAGTMKAAAGTMKAEDGjAIAkDGjAABkzCgAABkzCgBAxowCAJAxowAAZMwoAAAZMwoAQMaMAgCQMaMAAGTMKAAAGTMKAEDGjAIAkDGjAABkzCgAABkzCgBAxowCAJAxowAAZMwoAAAZMwoAQMaMAgCQMaMAAGTMKAAAGTMKAEDGjAIAkDGjAABkzCgAABkzCgBAxowCAJAxowAAZMwoAAAZMwoAQMaMAgCQMaMAAGTMKAAAGTMKAEDGjAIAkDGjAABkzCgAABkzCgBAxowCAJAxowAAZMwoAAAZMwoAQMaMAgCQMaMAAGTMKAAAGTMKAEDGjAIAkDGjAABkzCgAABkzCgBAxowCAJAxowAAZMwoAAAZMwoAQMaMAgCQMaMAAGTMKAAAGTMKAEDGjAIAkDGjAABkzCgAABkzCgBAxowCAJAxowAAZMwoAAAZMwoAQMaMAgCQMaMAAGTMKAAAGTMKAEDGjAIAkDGjAABkzCgAABkzCgBAxowCAJAxowAAZMwoAAAZMwoAQMaMAgCQMaMAAGTMKAAAGTMKAEDGjAIAkDGjAABkzCgAABkzCgBAxowCAJAxowAAZMwoAAAZMwoAQMaMAgCQMaMAAGTMKAAAGTMKAEDGjAIAkDGjAABkzCgAABkzCgBAxowCAJAxowAAZMwoAAAZMwoAQMaMAgCQMaMAAGTMKAAAGTMKAEDGjAIAkDGjAABkzCgAABkzCgBAxowCAJAxowAAZMwoAAAZMwoAQMaMAgCQMaMAAGTMKAAAGTMKAEDGjAIAkDGjAABkzCgAABkzCgBAxowCAJAxowAAZMwoAAAZMwoAQMaMAgCQMaMAAGTMKAAAGTMKAEDGjAIAkDGjAABkzCgAABkzCgBAxowCAJAxowAAZMwoAAAZMwoAQMaMAgCQMaMAAGTMKAAAGTMKAEDGjAIAkDGjAABkzCgAABkzCgBAxowCAJAxowAAZMwoAAAZMwoAQMaMAgCQMaMAAGTMKAAAGTMKAEDGjAIAkDGjAABkzCgAABkzCgBAxowCAJAxowAAZMwoAAAZMwoAQMaMAgCQMaMAAGTMKAAAGTMKAEDGjAIAkDGjAABkzCgAABkzCgBAxowCAJAxowAAZMwoAAAZMwoAQMaMAgCQMaMAAGTMKAAAGTMKAEDGjAIAkDGjAABkzCgAABkzCgBAxowCAJAxowAAZMwoAAAZMwoAQMaMAgCQMaMAAGTMKAAAGTMKAEDGjAIAkDGjAABkzCgAABkzCgBAxowCAJAxowAAZMwoAAAZMwoAQMaMAgCQMaMAAGTMKAAAGTMKAEDGjAIAkDGjAABkzCgAABkzCgBAxowCAJAxowAAZMwoAAAZMwoAQMaMAgCQMaMAAGTMKAAAGTMKAEDGjAIAkDGjAABkzCgAABkzCgBAxowCAJAxowAAZMwoAAAZMwoAQMaMAgCQMaMAAGTMKAAAGTMKAEDGjAIAkDGjAABkzCgAABkzCgBAxowCAJAxowAAZMwoAAAZMwoAQMaMAgCQMaMAAGTMKAAAGTMKAEDGjAIAkDGjAABkzCgAABkzCgBAxowCAJAxowAAZMwoAAAZMwoAQMaMAgCQMaMAAGTMKAAAGTMKAEDGjAIAkDGjAABkzCgAABkzCgBAxowCAJAxowAAZMwoAAAZMwoAQMaMAgCQMaMAAGTMKAAAGTMKAEDGjAIAkDGjAABkzCgAABkzCgBAxowCAJAxowAAZMwoAAAZMwoAQMaMAgCQMaMAAGTMKAAAGTMKAEDGjAIAkDGjAABkzCgAABkzCgBAxowCAJAxowAAZMwoAAAZMwoAQMaMAgCQMaMAAGTMKAAAGTMKAEDGjAIAkDGjAABkzCgAABkzCgBAxowCAJAxowAAZMwoAAAZMwoAQMaMAgCQMaMAAGTMKAAAGTMKAEDGjAIAkDGjAABkzCgAABkzCgBAxowCAJAxowAAZMwoAAAZMwoAQMaMAgCQMaMAAGTMKAAAGTMKAEDGjAIAkDGjAABkzCgAABkzCgBAxowCAJAxowAAZMwoAAAZMwoAQMaMAgCQMaMAAGTMKAAAGTMKAEDGjAIAkDGjAABkzCgAABkzCgBAxowCAJAxowAAZMwoAAAZMwoAQMaMAgCQ+QLiMQgQ6AL30QAAAABJRU5ErkJggg=="></p><p><br></p><blockquote>Vis in vidisse labores maiorum. Per ad vocent evertitur reprehendunt, est ei mundi forensibus interpretaris. Eu cum option patrioque assentior. Utinam graeci ne duo, idque doctus vix no, nemore efficiantur ne quo.</blockquote><p><br></p><p><br></p><p>Sed incorrupte intellegam cu. His nibh delenit invenire cu. Duo elitr consetetur deterruisset te. Tollit vivendo luptatum at ius, velit paulo ut eam, ius te splendide argumentum assueverit. Usu ex verear debitis fuisset, vix et feugiat appellantur, at mel simul recusabo. Eu quaeque signiferumque has, cu est alterum suscipiantur.</p><p><br></p><p>Discere electram principes nam cu. Adversarium repudiandae cum ei, conceptam referrentur ius ne. Te his mutat singulis. Vituperata signiferumque eos no, eum quas atomorum facilisis id, mea cetero salutatus dissentiet id. Viris dissentias ea qui.</p><p><br></p><p><br></p><p>Nemore senserit assueverit qui ad. Deseruisse intellegebat pro an. Ut quo habeo consulatu, decore albucius convenire vim at. Ferri graeci timeam sea cu, nam vocibus torquatos ex.</p>
  </div>
</div>

<button type="submit" class="btn btn-primary pull-right">
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
</script>

@endpush
