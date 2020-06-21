<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">{{ $title }}</h1>
      </div>
      @if(isset($btnText))
      <div class="col-sm-6 d-flex justify-content-end">
        <a href="{{ $linkTo ?? '#' }}">
          <button class="btn btn-success btn-sm">{{ $btnText }}</button>
        </a>
      </div>
      @endif
    </div>
  </div>
</div>