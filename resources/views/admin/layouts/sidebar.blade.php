<a href="index3.html" class="brand-link">
  <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
    style="opacity: .8">
  <span class="brand-text font-weight-light">LOGO</span>
</a>
<div class="sidebar">
  <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <li class="nav-item">
        <a href="{{ route('dashboard') }}" class="nav-link {{ request()->is('admin/dashboard') ? 'active' : '' }}">
          <i class="nav-icon fas fa-tachometer-alt"></i>
          <p>Dashboard</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('customers.index') }}"
          class="nav-link {{ request()->is('admin/customers*') ? 'active' : '' }}">
          <i class="nav-icon fas fa-users"></i>
          <p>Customers Management</p>
        </a>
      </li>
      <li class=" nav-item">
        <a href="{{ route('products.index') }}" class="nav-link {{ request()->is('admin/products*') ? 'active' : '' }}">
          <i class="nav-icon fas fa-seedling"></i>
          <p>Products Management</p>
        </a>
      </li>
      <li class=" nav-item">
        <a href="{{ route('categories.index') }}"
          class="nav-link {{ request()->is('admin/categories*') ? 'active' : '' }}">
          <i class="nav-icon fas fa-list"></i>
          <p>Categories</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('orders.index') }}" class="nav-link {{ request()->is('admin/orders*') ? 'active' : '' }}">
          <i class="nav-icon fas fa-money-bill"></i>
          <p>Orders Management</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('news.index') }}" class="nav-link {{ request()->is('admin/news*') ? 'active' : '' }}">
          <i class="nav-icon fas fa-newspaper"></i>
          <p>News Management</p>
        </a>
      </li>
    </ul>
  </nav>
</div>