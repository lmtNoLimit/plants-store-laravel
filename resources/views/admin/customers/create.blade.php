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
      @include('admin.layouts.contentHeader', ['title' => 'Customers Management'])

      <div class="content">
        <div class="container-fluid">
          <form role="form" action="{{ action('CustomerController@store') }}" method="POST">
            @csrf
            <div class="row">
              <div class="col-md-6">
                <div class="card card-success">
                  <div class="card-header">
                    <h3 class="card-title">Required information</h3>
                  </div>
                  <div class="card-body">
                    <div class="form-group">
                      <label for="name">Full Name</label>
                      <input type="text" class="form-control @if($errors->has('name')) is-invalid @endif" id="name"
                        placeholder="Enter your fullname" name="name" value="{{ old('name') }}">
                      @if($errors->has('name'))
                      <div class="invalid-feedback">
                        {{$errors->first('name')}}
                      </div>
                      @endif
                    </div>
                    <div class="form-group">
                      <label for="username">Username</label>
                      <input type="text" class="form-control @if($errors->has('username')) is-invalid @endif"
                        id="username" placeholder="Enter username" name="username" value="{{ old('username') }}">
                      @if($errors->has('username'))
                      <div class="invalid-feedback">
                        {{$errors->first('username')}}
                      </div>
                      @endif
                    </div>
                    <div class="form-group">
                      <label for="phone">Phone number</label>
                      <input type="text" class="form-control @if($errors->has('phone')) is-invalid @endif" id="phone"
                        placeholder="Your phone number" name="phone" value="{{ old('phone') }}">
                      @if($errors->has('phone'))
                      <div class="invalid-feedback">
                        {{$errors->first('phone')}}
                      </div>
                      @endif
                    </div>
                    <div class="form-group">
                      <label for="password">Password</label>
                      <input type="text" class="form-control @if($errors->has('password')) is-invalid @endif"
                        id="password" placeholder="Password" name="password" value="{{ old('password') }}">
                      @if($errors->has('password'))
                      <div class="invalid-feedback">
                        {{$errors->first('password')}}
                      </div>
                      @endif
                    </div>
                    <div class="form-group">
                      <label for="password_confirmation">Confirm Password</label>
                      <input type="text"
                        class="form-control @if($errors->has('password_confirmation')) is-invalid @endif"
                        id="password_confirmation" placeholder="Confirm password" name="password_confirmation"
                        value="{{ old('password_confirmation') }}">
                      @if($errors->has('password_confirmation'))
                      <div class="invalid-feedback">
                        {{$errors->first('password_confirmation')}}
                      </div>
                      @endif
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="card card-success">
                  <div class="card-header">
                    <h3 class="card-title">Advanced information</h3>
                  </div>
                  <div class="card-body">
                    <div class="form-group">
                      <label for="gender">Gender</label>
                      <select class="form-control @if($errors->has('gender')) is-invalid @endif" id="gender"
                        name="gender" value="{{ old('gender') }}">
                        <option value="female">Female</option>
                        <option value="male">Male</option>
                      </select>
                      @if($errors->has('gender'))
                      <div class="invalid-feedback">
                        {{$errors->first('gender')}}
                      </div>
                      @endif
                    </div>
                    <div class="form-group">
                      <label for="address">Address</label>
                      <input type="text" class="form-control @if($errors->has('address')) is-invalid @endif"
                        id="address" placeholder="Enter your address" name="address" value="{{ old('address') }}">
                      @if($errors->has('address'))
                      <div class="invalid-feedback">
                        {{$errors->first('address')}}
                      </div>
                      @endif
                    </div>
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input type="text" class="form-control @if($errors->has('email')) is-invalid @endif" id="email"
                        placeholder="Enter your email address" name="email" value="{{ old('email') }}">
                      @if($errors->has('email'))
                      <div class="invalid-feedback">
                        {{$errors->first('email')}}
                      </div>
                      @endif
                    </div>
                    <div class="form-group">
                      <label for="title">Date of Birth</label>
                      <input type="date" class="form-control @if($errors->has('title')) is-invalid @endif" id="title"
                        placeholder="Enter title" name="title" value="{{ old('title') }}">
                      @if($errors->has('title'))
                      <div class="invalid-feedback">
                        {{$errors->first('title')}}
                      </div>
                      @endif
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="text-center">
              <a href="{{ route('customers.index') }}" class="btn btn-secondary">Cancel</a>
              <button type="submit" class="btn btn-success">Create</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  @include('admin.layouts.partials.bottom')