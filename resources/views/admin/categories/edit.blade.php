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
      'title' => 'Cập nhật thông tin danh mục',
      ])

      <!-- Main content -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-6">

              <div class="card card-success">
                <div class="card-header">
                  <h3 class="card-title">Thông tin danh mục</h3>
                </div>
                <!-- form start -->
                <form role="form" action="{{ action('CategoryController@update', $category->id) }}" method="POST"
                  enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                  <div class="card-body">
                    <div class="form-group">
                      <label for="title">Tiêu đề</label>
                      <input type="text" class="form-control @if($errors->has('title')) is-invalid @endif" id="title"
                        placeholder="Nhập tiêu đề" name="title" value="{{ old('title', $category->title) }}">
                      @if($errors->has('title'))
                      <div class="invalid-feedback">
                        {{$errors->first('title')}}
                      </div>
                      @endif
                    </div>
                    <div class="form-group">
                      <label for="featured_image">Ảnh</label>
                      <input type="file" class="form-control-file" id="validatedCustomFile" name="featured_image"
                        multiple>
                      @if($category->featured_image)
                      <div class="mt-3">
                        <img src="{{ asset('storage'.$category->featured_image) }}"
                          alt="Category Featured Image {{$category->featured_image}}" width="90" height="90">
                      </div>
                      @endif
                      @if($errors->has('featured_image'))
                      <div class="invalid-feedback">
                        {{$errors->first('featured_image')}}
                      </div>
                      @endif
                    </div>
                  </div>
                  <div class="card-footer text-center">
                    <a href="{{ route('categories.index') }}" class="btn btn-secondary">Cancel</a>
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