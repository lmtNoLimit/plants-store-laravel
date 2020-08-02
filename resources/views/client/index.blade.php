<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8">
  <meta name="description" content="Ogani Template">
  <meta name="keywords" content="Ogani, unica, creative, html">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>TNGreen</title>
  <!-- Css Styles -->
  @include('client.common.assets')
</head>

<body>
  @include('client.section.humberger_menu')
  @include('client.section.header')
  @include('client.section.hero')

  <div class="container mb-5">
    <div class="hero__item set-bg" data-setbg="{{ asset('dist/img/banner/banner.jpg') }}">
      <div class="hero__text">
        <span>Cây đẹp</span>
        <h2>ƯU ĐÃI CHO LẦN<br/> MUA TIẾP THEO</h2>
        <p>Miễn phí vận chuyển</p>
        <a href="{{ route('client_shop') }}" class="primary-btn">MUA NGAY</a>
      </div>
    </div>
  </div>


  <!-- Categories Section Begin -->
  <section class="categories">
    <div class="container">
      <div class="row">
        <div class="categories__slider owl-carousel">
          @foreach($categories as $category)
          <div class="col-lg-3">
            <div class="categories__item set-bg" data-setbg="{{ asset('storage'.$category->featured_image) }}">
              <h5><a href="#">{{$category->title}}</a></h5>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </section>
  <!-- Categories Section End -->

  <!-- Featured Section Begin -->
  <section class="featured spad">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="section-title">
            <h2>Featured Product</h2>
          </div>
        </div>
      </div>
      <div class="row featured__filter">
        @foreach($products as $product)
        <div class="col-lg-3 col-md-4 col-sm-6 mix {{$product->category_id}}">
          <div class="featured__item">
            <div class="featured__item__pic set-bg" data-setbg="{{ asset('storage'.$product->images[0]->image) }}">
              <ul class="featured__item__pic__hover">
                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                <li>
                  <form action="{{ action('Client\CartController@addToCart', $product->id) }}" method="POST">
                    @csrf
                    <button type="submit">
                      <i class="fa fa-shopping-cart"></i>
                    </button>
                  </form>
                </li>
              </ul>
            </div>
            <div class="featured__item__text">
              <h6><a href="{{ route('client_product_detail', $product->id) }}">{{$product->name}}</a></h6>
              <h5>@money($product->price, 'VND')</h5>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>
  <!-- Featured Section End -->

  <!-- Blog Section Begin -->
  <section class="from-blog spad">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="section-title from-blog__title">
            <h2>From The Blog</h2>
          </div>
        </div>
      </div>
      <div class="row">
        @foreach($blogs as $blog)
        <div class="col-lg-4 col-md-4 col-sm-6">
          <div class="blog__item">
            <div class="blog__item__pic">
              <img src="{{ asset('storage'.$blog->featured_image) }}" alt="">
            </div>
            <div class="blog__item__text">
              <ul>
                <li>
                  <i class="fa fa-calendar-o"></i>
                  {{date('M j,Y', strtotime($blog->created_at))}}
                </li>
              </ul>
              <h5><a href="{{ route('client_blog_detail', $blog->id) }}">{{$blog->title}}</a></h5>
              <!-- <p>{{$blog->description}}</p> -->
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>
  <!-- Blog Section End -->

  @include('client.section.footer')

  <!-- Js Plugins -->
  @include('client.common.plugin')
</body>

</html>