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
      'title' => 'Danh sách liên hệ',
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
                    <th>Name</th>
                    <th>Email</th>
                    <th>Ngày gửi</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($contacts as $contact)
                  <tr>
                    <td class="align-middle">{{ $contact->name }}</td>
                    <td class="align-middle">{{ $contact->email }}</td>
                    <td class="align-middle">{{ $contact->created_at }}</td>
                    <td class="align-middle">
                      <button class="btn btn-sm btn-danger" data-toggle="modal"
                        data-target="#deleteModal{{ $contact->id }}">
                        Delete
                      </button>
                      <div class="modal fade" id="deleteModal{{ $contact->id }}" tabindex="-1" role="dialog"
                        aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Message</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                  aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                              <p>Are you sure to delete this category?</p>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">
                                Cancel
                              </button>
                              <form action="{{ action('ContactController@destroy', $contact->id) }}" method="POST">
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