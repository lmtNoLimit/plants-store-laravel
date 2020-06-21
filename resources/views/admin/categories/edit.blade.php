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
      @include('admin.layouts.contentHeader', [
      'title' => 'Update category information',
      ])

      <!-- Main content -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-6">

              <div class="card card-success">
                <div class="card-header">
                  <h3 class="card-title">Category info</h3>
                </div>
                <!-- form start -->
                <form role="form" action="{{ action('CategoryController@update', $category->id) }}" method="POST">
                  @csrf
                  @method('PUT')
                  <div class="card-body">
                    <div class="form-group">
                      <label for="title">Title</label>
                      <input type="text" class="form-control @if($errors->has('title')) is-invalid @endif" id="title"
                        placeholder="Enter title" name="title" value="{{ old('title', $category->title) }}">
                      @if($errors->has('title'))
                      <div class="invalid-feedback">
                        {{$errors->first('title')}}
                      </div>
                      @endif
                    </div>
                  </div>
                  <div class="card-footer text-center">
                    <button class="btn btn-secondary">Cancel</button>
                    <button type="submit" class="btn btn-success">Save changes</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  @include('admin.layouts.partials.bottom')