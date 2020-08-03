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
      'title' => 'Quản lý khách hàng',
      'btnText' => 'Thêm khách hàng',
      'linkTo' => route('customers.create')
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
                    <th>ID</th>
                    <th>Họ và tên</th>
                    <th>Tài khoản</th>
                    <th>Điện thoại</th>
                    <th>Email</th>
                    <th>Ngày sinh</th>
                    <th>Địa chỉ</th>
                    <th>Cập nhật gần nhất</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($customers as $customer)
                  <tr>
                    <td>{{ $customer->id }}</td>
                    <td>{{ $customer->name }}</td>
                    <td>{{ $customer->username }}</td>
                    <td>{{ $customer->phone }}</td>
                    <td>{{ $customer->email }}</td>
                    <td>{{ $customer->birthday }}</td>
                    <td>{{ $customer->address }}</td>
                    <td>{{ $customer->updated_at }}</td>
                    <td>
                      <a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-sm btn-info">
                        Sửa
                      </a>
                      <button class="btn btn-sm btn-danger" data-toggle="modal"
                        data-target="#deleteModal{{ $customer->id }}">
                        Xoá
                      </button>
                      <div class="modal fade" id="deleteModal{{ $customer->id }}" tabindex="-1" role="dialog"
                        aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Message</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                  aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                              <p>Are you sure to delete <strong>{{ $customer->name }}</strong> from customers?</p>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">
                                Huỷ
                              </button>
                              <form action="{{ action('CustomerController@destroy', $customer->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                  Xoá
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