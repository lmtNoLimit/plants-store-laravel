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
      @include('admin.layouts.contentHeader', ['title' => 'Create blog'])

      <div class="content">
        <div class="container-fluid">
          <form role="form" action="{{ action('ProductController@store') }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            <div class="row">
              <div class="col-md-7 col-sm-12">
                <div class="card">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="title">Title</label>
                      <input type="text" class="form-control @if($errors->has('title')) is-invalid @endif" id="title"
                        placeholder="e.g Blog about your latest products or deals" name="title"
                        value="{{ old('title') }}">
                      @if($errors->has('title'))
                      <div class="invalid-feedback">
                        {{$errors->first('title')}}
                      </div>
                      @endif
                    </div>

                    <div class="form-group">
                      <label for="content">Content</label>
                      <textarea class="form-control @if($errors->has('content')) is-invalid @endif" id="content"
                        name="content" value="{{ old('content') }}"></textarea>
                      @if($errors->has('content'))
                      <div class="invalid-feedback">
                        {{$errors->first('content')}}
                      </div>
                      @endif
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4 col-sm-12">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title  text-bold">Visibility</h3>
                  </div>
                  <div class="card-body">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="published" id="true" value="true" checked>
                      <label class="form-check-label" for="true">
                        Visible
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="published" id="false" value="false">
                      <label class="form-check-label" for="false">
                        Hidden
                      </label>
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title text-bold">Featured Image</h3>
                  </div>
                  <div class="card-body">
                    <div class="form-group">
                      <input type="file" class="form-control-file" name="featured_image" multiple>
                      @if($errors->has('featured_image'))
                      <div class="invalid-feedback">
                        {{$errors->first('featured_image')}}
                      </div>
                      @endif
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="text-center">
              <a href="{{ route('blogs.index') }}" class="btn btn-secondary">Cancel</a>
              <button type="submit" class="btn btn-success">Create</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script src="{{ asset('node_modules/tinymce/tinymce.js') }}"></script>

  <script>
    tinymce.init({
    selector: '#content',
    height: 350,
    plugins: 'paste link image table',
    toolbar: 'undo redo | styleselect | bold italic underline | alignleft aligncenter alignright alignjustify | image link | table',
    image_upload_url: ''  
  });
  </script>

  @include('admin.layouts.partials.bottom')