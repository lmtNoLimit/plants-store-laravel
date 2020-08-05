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
      @include('admin.layouts.contentHeader', ['title' => 'Thêm sản phẩm'])

      <div class="content">
        <div class="container-fluid">
          <form role="form" action="{{ action('ProductController@store') }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            <div class="row">
              <div class="col-12">
                <div class="card card-success">
                  <div class="card-header">
                    <h3 class="card-title">Thông tin sản phẩm</h3>
                  </div>
                  <div class="card-body">
                    <div class="form-row">
                      <div class="col-sm-12 col-md-7 mb-3">
                        <label for="name">Tên sản phẩm</label>
                        <input type="text" class="form-control @if($errors->has('name')) is-invalid @endif" id="name"
                          placeholder="Nhập tên sản phẩm" name="name" value="{{ old('name') }}">
                        @if($errors->has('name'))
                        <div class="invalid-feedback">
                          {{$errors->first('name')}}
                        </div>
                        @endif
                      </div>
                      <div class="col-sm-12 col-md-5 mb-3">
                        <label for="category_id">Danh mục</label>
                        <select class="form-control @if($errors->has('category_id')) is-invalid @endif" id="category_id"
                          name="category_id">
                          <option selected disabled>Select category</option>
                          @foreach($categories as $category)
                          <option value="{{$category->id}}">{{$category->title}}</option>
                          @endforeach
                        </select>
                        @if($errors->has('category_id'))
                        <div class="invalid-feedback">
                          {{$errors->first('category_id')}}
                        </div>
                        @endif
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="description">Mô tả</label>
                      <textarea class="form-control @if($errors->has('description')) is-invalid @endif" id="description"
                        placeholder="Mô tả chung về sản phẩm" name="description" value="{{ old('description') }}"
                        rows="5"></textarea>
                      @if($errors->has('description'))
                      <div class="invalid-feedback">
                        {{$errors->first('description')}}
                      </div>
                      @endif
                    </div>

                    <div class="form-group">
                      <label for="images">Ảnh</label>
                      <input type="file" class="form-control-file" id="validatedCustomFile" name="images[]" multiple>
                      @if($errors->has('images'))
                      <div class="invalid-feedback">
                        {{$errors->first('images')}}
                      </div>
                      @endif
                    </div>

                    <div class="form-row">
                      <div class="col-sm-12 col-md-4 mb-3">
                        <label for="quantity">Số lượng</label>
                        <input type="number" class="form-control @if($errors->has('quantity')) is-invalid @endif"
                          id="quantity" name="quantity" value="{{ old('quantity', 0) }}">
                        @if($errors->has('quantity'))
                        <div class="invalid-feedback">
                          {{$errors->first('quantity')}}
                        </div>
                        @endif
                      </div>
                      <div class="col-sm-12 col-md-4 mb-3">
                        <label for="price">Giá</label>
                        <input type="text" class="form-control @if($errors->has('price')) is-invalid @endif" id="price"
                          name="price" value="{{ old('price') }}">
                        @if($errors->has('price'))
                        <div class="invalid-feedback">
                          {{$errors->first('price')}}
                        </div>
                        @endif
                      </div>
                      <div class="col-sm-12 col-md-4 mb-3">
                        <label for="sale_price">Giá ưu đãi</label>
                        <input type="text" class="form-control @if($errors->has('sale_price')) is-invalid @endif"
                          id="sale_price" name="sale_price" value="{{ old('sale_price') }}">
                        @if($errors->has('sale_price'))
                        <div class="invalid-feedback">
                          {{$errors->first('sale_price')}}
                        </div>
                        @endif
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="text-center">
              <a href="{{ route('products.index') }}" class="btn btn-secondary">Huỷ</a>
              <button type="submit" class="btn btn-success">Tạo</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  @include('admin.layouts.partials.bottom')