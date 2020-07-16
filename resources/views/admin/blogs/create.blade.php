@include('admin.layouts.partials.top')

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <!-- Navbar -->
    @include('admin.layouts.navbar')

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-light-success elevation-4">
      @include('admin.layouts.sidebar')
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      @include('admin.layouts.contentHeader', ['title' => 'Create product'])

      <div class="content">
        <div class="container-fluid">
          <form role="form" action="{{ action('ProductController@store') }}" method="POST"
            enctype="multipart/form-data">
            @csrf

            <div class="form-row">
              <div class="col-sm-12 col-md-7 mb-3">
                <label for="name">Product title</label>
                <input type="text" class="form-control @if($errors->has('name')) is-invalid @endif" id="name"
                  placeholder="Product title" name="name" value="{{ old('name') }}">
                @if($errors->has('name'))
                <div class="invalid-feedback">
                  {{$errors->first('name')}}
                </div>
                @endif
              </div>
            </div>

            <div class="form-group">
              <label for="content">Content</label>
              <textarea class="@if($errors->has('content')) is-invalid @endif" id="content" name="content"
                value="{{ old('content') }}" rows="5"></textarea>
              @if($errors->has('content'))
              <div class="invalid-feedback">
                {{$errors->first('content')}}
              </div>
              @endif
            </div>

            <div class="form-group">
              <label for="image">Images</label>
              <input type="file" class="form-control-file" id="validatedCustomFile" name="images[]" multiple>
              @if($errors->has('image'))
              <div class="invalid-feedback">
                {{$errors->first('image')}}
              </div>
              @endif
            </div>
            <div class="text-center">
              <a href="{{ route('products.index') }}" class="btn btn-secondary">Cancel</a>
              <button type="submit" class="btn btn-success">Create</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.tiny.cloud/1/88qa93s5gx7nzwcprsx86fveie0jxxhx73p8xyh2w1xk4nbi/tinymce/5/tinymce.min.js"
    referrerpolicy="origin" />
  </script>
  <script>
    tinymce.init({
    selector: '#content',
    plugins: 'image paste code table link imagetools media ',
    toolbar: 
  });
  </script>

  @include('admin.layouts.partials.bottom')