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
      'title' => 'Blogs Management',
      'btnText' => 'Create blog',
      'linkTo' => route('blogs.create')
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
                    <th></th>
                    <th>Title</th>
                    <th>Published</th>
                    <th>Tags</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($blogs as $blog)
                  <tr>
                    <td class="align-middle" style="width: 60px;">
                      <img src="{{ asset('storage'.$blog->featured_image) }}" width="50">
                    </td>
                    <td class="align-middle">{{$blog->title}}</td>
                    <td class="align-middle">
                      <span class="badge badge-{{$blog->published === 1 ? 'success' : 'light'}} p-1">
                        {{$blog->published === 1 ? "Published" : "Unpublished"}}
                      </span>
                    </td>
                    <td class="align-middle">
                      <span class="tag">{{$blog->tags}}</span>
                    </td>
                    <td class="align-middle">
                      <a href="{{ route('client_blog_detail', $blog->id) }}" class="btn btn-sm btn-info" target="_blank">
                        <i class="fas fa-eye"></i>
                      </a>
                      <a href="{{ route('blogs.edit', $blog->id) }}" class="btn btn-sm btn-info">
                        <i class="fas fa-cog"></i>
                      </a>
                      <button class="btn btn-sm btn-danger" data-toggle="modal"
                        data-target="#deleteModal{{ $blog->id }}">
                        <i class="fas fa-trash-alt"></i>
                      </button>
                      <div class="modal fade" id="deleteModal{{ $blog->id }}" tabindex="-1" role="dialog"
                        aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Message</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                  aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                              <p>Are you sure to delete <strong>{{$blog->title}}</strong> from blogs?</p>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">
                                Cancel
                              </button>
                              <form action="{{ action('BlogController@destroy', $blog->id) }}" method="POST">
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