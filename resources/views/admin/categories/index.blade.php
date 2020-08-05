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
      'title' => 'Quản lý danh mục',
      'btnText' => 'Thêm danh mục',
      'linkTo' => route('categories.create')
      ])
      @include('admin.message')
      <!-- Main content -->
      <div class="content">
        <div class="container-fluid">
          <div class="card">
            <div class="card-body table-responsive p-0">
              <table class="table table-hover text-nowrap">
                <thead>
                  <tr>
                    <th style="width: 60px;"></th>
                    <th>Tiêu đề</th>
                    <th>Ngày tạo</th>
                    <th>Ngày cập nhật gần nhất</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($categories as $category)
                  <tr>
                    <td class="align-middle">
                      <img src="{{ $category->featured_image ? asset('storage'.$category->featured_image) : '' }}"
                        width="50">
                    </td>
                    <td class="align-middle">{{ $category->title }}</td>
                    <td class="align-middle">{{ $category->created_at }}</td>
                    <td class="align-middle">{{ $category->updated_at }}</td>
                    <td class="align-middle">
                      <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-sm btn-info">
                        Sửa
                      </a>
                      <button class="btn btn-sm btn-danger" data-toggle="modal"
                        data-target="#deleteModal{{ $category->id }}">
                        Xoá
                      </button>
                      <div class="modal fade" id="deleteModal{{ $category->id }}" tabindex="-1" role="dialog"
                        aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Thông báo</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                  aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                              <p>Bạn có chắc muốn xoá <strong>{{ $category->title }}</strong> khỏi danh mục?</p>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">
                                Cancel
                              </button>
                              <form action="{{ action('CategoryController@destroy', $category->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                  Delete
                                </button>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
  <!-- ./wrapper -->

  @include('admin.layouts.partials.bottom')