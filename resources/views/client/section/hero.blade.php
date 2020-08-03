<section class="hero hero-normal">
  <div class="container">
    <div class="row">
      <div class="col-lg-3">
        <div class="hero__categories">
          <div class="hero__categories__all">
            <i class="fa fa-bars"></i>
            <span>Danh mục</span>
          </div>
          <ul>
            @foreach($categories as $category)
            <li>
              <a href="{{ route('client_shop') }}?category={{$category->slug}}">
                {{$category->title}}
              </a>
            </li>
            @endforeach
          </ul>
        </div>
      </div>
      <div class="col-lg-9">
        <div class="hero__search">
          <div class="hero__search__form">
            <form action="{{ route('client_shop') }}" method="GET">
              <input type="text" name="search" placeholder="Tìm kiếm một loài cây?" value="{{ request()->get('search') }}">
              <button type="submit" class="site-btn">Tìm kiếm</button>
            </form>
          </div>
          <div class="hero__search__phone">
            <div class="hero__search__phone__icon">
              <i class="fa fa-phone"></i>
            </div>
            <div class="hero__search__phone__text">
              <h5>+84 969.546.799</h5>
              <span>Hỗ trợ / Tư vấn 24/7</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>