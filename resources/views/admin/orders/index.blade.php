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
      'title' => 'Orders Management'
      ])

      <!-- Main content -->
      <div class="content">
        <div class="container-fluid">
          <div class="card">
            <div class="card-body table-responsive p-0">
              <table class="table table-hover text-nowrap">
                <thead>
                  <tr>
                    <th>Tên người nhận</th>
                    <th>Email</th>
                    <th>SĐT</th>
                    <th>Address</th>
                    <th>T.gian đặt hàng</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($orders as $order)
                  <tr>
                    <td>{{ $order->name }}</td>
                    <td>{{ $order->email }}</td>
                    <td>{{ $order->phone }}</td>
                    <td>{{ $order->address }}</td>
                    <td>{{ date('d/m/Y h:i:s', strtotime($order->created_at)) }}</td>
                    <td>
                      <button class="btn btn-sm btn-success">Duyệt</button>
                      <button class="btn btn-sm btn-danger">Từ chối</button>
                    </td>
                  </tr>
                  <tr>
                    <th></th>
                    <th>Sản phẩm</th>
                    <th>Số lượng</th>
                    <th></th>
                    <th></th>
                    <th></th>
                  </tr>
                  @foreach($order->details as $item)
                  <tr>
                    <td></td>
                    <td>{{ $item->product->name }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  @endforeach
                  @endforeach
                </tbody>
              </table>
              {{ $orders->links() }}
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
  <!-- ./wrapper -->

  @include('admin.layouts.partials.bottom')