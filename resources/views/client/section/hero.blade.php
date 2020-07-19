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
              <a href="#">
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
            <form action="#">
              <input type="text" placeholder="What do you need?">
              <button type="submit" class="site-btn">SEARCH</button>
            </form>
          </div>
          <div class="hero__search__phone">
            <div class="hero__search__phone__icon">
              <i class="fa fa-phone"></i>
            </div>
            <div class="hero__search__phone__text">
              <h5>+84 969.546.799</h5>
              <span>support 24/7 time</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>