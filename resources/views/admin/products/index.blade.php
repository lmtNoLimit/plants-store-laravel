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
      'title' => 'Products Management',
      'btnText' => 'Create Product',
      'linkTo' => route('products.create')
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
                    <th>Title</th>
                    <th>Image</th>
                    <th>Inventory</th>
                    <th>Price</th>
                    <th>Sale Price</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($products as $product)
                  <tr>
                    <td class="align-middle">{{$product->id}}</td>
                    <td class="align-middle">{{$product->name}}</td>
                    <td>
                      <img src="{{ asset('storage'.$product->images[0]->image) }}" alt="" width="90" height="90">
                    </td>
                    <td class="align-middle">{{$product->quantity}}</td>
                    <td class="align-middle">@money($product->price, 'VND')</td>
                    <td class="align-middle">
                      @if(isset($product->sale_price))
                        @money($product->sale_price, 'VND')
                      @endif
                    </td>
                    <td class="align-middle">
                      <a href="{{ route('client_product_detail', $product->id) }}" class="btn btn-sm btn-info" target="_blank">
                        <i class="fas fa-eye"></i>
                      </a>
                      <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-info">
                        <i class="fas fa-cog"></i>
                      </a>
                      <button class="btn btn-sm btn-danger" data-toggle="modal"
                        data-target="#deleteModal{{ $product->id }}">
                        <i class="fas fa-trash-alt"></i>
                      </button>
                      <div class="modal fade" id="deleteModal{{ $product->id }}" tabindex="-1" role="dialog"
                        aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Message</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                  aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                              <p>Are you sure to delete <strong>{{$product->name}}</strong> from products?</p>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">
                                Cancel
                              </button>
                              <form action="{{ action('ProductController@destroy', $product->id) }}" method="POST">
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