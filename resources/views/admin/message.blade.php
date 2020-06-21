@if($message = Session::get('error'))
<div class="alert alert-danger alert-dismissible fade show position-fixed"
  style="top: 20px; right: 20px; z-index: 99999; opacity: .8;">
  {{$message}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true" class="text-white">&times;</span>
  </button>
</div>
@endif

@if($message = Session::get('success'))
<div class="alert alert-success alert-dismissible fade show position-fixed" role="alert"
  style="top: 20px; right: 20px; z-index: 99999; opacity: .8;">
  {{$message}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true" class="text-white">&times;</span>
  </button>
</div>
@endif