
<div style="    border-bottom: 0.5px solid #ccc;
    padding-bottom: 20px;">
  @include('layouts.user', ['data' => $comment])

  <div>
    {{$comment->text}}
  </div>

</div>
