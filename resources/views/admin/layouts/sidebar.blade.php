<a href="{{ route('dashboard') }}" class="brand-link text-center" style="padding: 6px 8px;">
  <img src="{{ asset('dist/img/logo.svg') }}" alt="Logo" width="133">
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
          <p>Khách hàng</p>
        </a>
      </li>
      <li class=" nav-item">
        <a href="{{ route('products.index') }}" class="nav-link {{ request()->is('admin/products*') ? 'active' : '' }}">
          <i class="nav-icon fas fa-seedling"></i>
          <p>Sản phẩm</p>
        </a>
      </li>
      <li class=" nav-item">
        <a href="{{ route('categories.index') }}"
          class="nav-link {{ request()->is('admin/categories*') ? 'active' : '' }}">
          <i class="nav-icon fas fa-list"></i>
          <p>Danh mục</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('orders.index') }}" class="nav-link {{ request()->is('admin/orders*') ? 'active' : '' }}">
          <i class="nav-icon fas fa-money-bill"></i>
          <p>Đơn hàng</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('blogs.index') }}" class="nav-link {{ request()->is('admin/blogs*') ? 'active' : '' }}">
          <i class="nav-icon fas fa-newspaper"></i>
          <p>Tin tức</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('contacts.index') }}" class="nav-link {{ request()->is('admin/contacts*') ? 'active' : '' }}">
          <i class="nav-icon fas fa-phone"></i>
          <p>Liên hệ</p>
        </a>
      </li>
    </ul>
  </nav>
</div>