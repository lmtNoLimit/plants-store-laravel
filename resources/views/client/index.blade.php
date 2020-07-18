<!DOCTYPE html>
<html lang="zxx">

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

  <div class="container">
    <div class="hero__item set-bg" data-setbg="{{ asset('dist/img/banner/banner.jpg') }}">
      <div class="hero__text">
        <span>FRUIT FRESH</span>
        <h2>Vegetable <br />100% Organic</h2>
        <p>Free Pickup and Delivery Available</p>
        <a href="#" class="primary-btn">SHOP NOW</a>
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
            <div class="categories__item set-bg" data-setbg="{{ asset('abc') }}">
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
      <div class="row">
        <div class="col-lg-3 col-md-4 col-sm-6">
          <div class="row featured__filter">
            @foreach($products as $product)
            <div class="col-lg-3 col-md-4 col-sm-6 mix {{$product->category_id}}">
              <div class="featured__item">
                <div class="featured__item__pic set-bg" data-setbg="{{ asset('storage'.$product->images[0]->image) }}">
                  <ul class="featured__item__pic__hover">
                    <li><a href="#"><i class="fa fa-heart"></i></a></li>
                    <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                    <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                  </ul>
                </div>
                <div class="featured__item__text">
                  <h6><a href="#">{{$product->name}}</a></h6>
                  <h5>{{$product->price}}</h5>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Featured Section End -->

  <!-- Banner Begin -->
  <div class="banner">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6">
          <div class="banner__pic">
            <img src="img/banner/banner-1.jpg" alt="">
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6">
          <div class="banner__pic">
            <img src="img/banner/banner-2.jpg" alt="">
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Banner End -->

  <!-- Latest Product Section Begin -->
  <section class="latest-product spad">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-6">
          <div class="latest-product__text">
            <h4>Latest Products</h4>
            <div class="latest-product__slider owl-carousel">
              <div class="latest-prdouct__slider__item">
                <a href="#" class="latest-product__item">
                  <div class="latest-product__item__pic">
                    <img src="img/latest-product/lp-1.jpg" alt="">
                  </div>
                  <div class="latest-product__item__text">
                    <h6>Crab Pool Security</h6>
                    <span>$30.00</span>
                  </div>
                </a>
                <a href="#" class="latest-product__item">
                  <div class="latest-product__item__pic">
                    <img src="img/latest-product/lp-2.jpg" alt="">
                  </div>
                  <div class="latest-product__item__text">
                    <h6>Crab Pool Security</h6>
                    <span>$30.00</span>
                  </div>
                </a>
                <a href="#" class="latest-product__item">
                  <div class="latest-product__item__pic">
                    <img src="img/latest-product/lp-3.jpg" alt="">
                  </div>
                  <div class="latest-product__item__text">
                    <h6>Crab Pool Security</h6>
                    <span>$30.00</span>
                  </div>
                </a>
              </div>
              <div class="latest-prdouct__slider__item">
                <a href="#" class="latest-product__item">
                  <div class="latest-product__item__pic">
                    <img src="img/latest-product/lp-1.jpg" alt="">
                  </div>
                  <div class="latest-product__item__text">
                    <h6>Crab Pool Security</h6>
                    <span>$30.00</span>
                  </div>
                </a>
                <a href="#" class="latest-product__item">
                  <div class="latest-product__item__pic">
                    <img src="img/latest-product/lp-2.jpg" alt="">
                  </div>
                  <div class="latest-product__item__text">
                    <h6>Crab Pool Security</h6>
                    <span>$30.00</span>
                  </div>
                </a>
                <a href="#" class="latest-product__item">
                  <div class="latest-product__item__pic">
                    <img src="img/latest-product/lp-3.jpg" alt="">
                  </div>
                  <div class="latest-product__item__text">
                    <h6>Crab Pool Security</h6>
                    <span>$30.00</span>
                  </div>
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="latest-product__text">
            <h4>Top Rated Products</h4>
            <div class="latest-product__slider owl-carousel">
              <div class="latest-prdouct__slider__item">
                <a href="#" class="latest-product__item">
                  <div class="latest-product__item__pic">
                    <img src="img/latest-product/lp-1.jpg" alt="">
                  </div>
                  <div class="latest-product__item__text">
                    <h6>Crab Pool Security</h6>
                    <span>$30.00</span>
                  </div>
                </a>
                <a href="#" class="latest-product__item">
                  <div class="latest-product__item__pic">
                    <img src="img/latest-product/lp-2.jpg" alt="">
                  </div>
                  <div class="latest-product__item__text">
                    <h6>Crab Pool Security</h6>
                    <span>$30.00</span>
                  </div>
                </a>
                <a href="#" class="latest-product__item">
                  <div class="latest-product__item__pic">
                    <img src="img/latest-product/lp-3.jpg" alt="">
                  </div>
                  <div class="latest-product__item__text">
                    <h6>Crab Pool Security</h6>
                    <span>$30.00</span>
                  </div>
                </a>
              </div>
              <div class="latest-prdouct__slider__item">
                <a href="#" class="latest-product__item">
                  <div class="latest-product__item__pic">
                    <img src="img/latest-product/lp-1.jpg" alt="">
                  </div>
                  <div class="latest-product__item__text">
                    <h6>Crab Pool Security</h6>
                    <span>$30.00</span>
                  </div>
                </a>
                <a href="#" class="latest-product__item">
                  <div class="latest-product__item__pic">
                    <img src="img/latest-product/lp-2.jpg" alt="">
                  </div>
                  <div class="latest-product__item__text">
                    <h6>Crab Pool Security</h6>
                    <span>$30.00</span>
                  </div>
                </a>
                <a href="#" class="latest-product__item">
                  <div class="latest-product__item__pic">
                    <img src="img/latest-product/lp-3.jpg" alt="">
                  </div>
                  <div class="latest-product__item__text">
                    <h6>Crab Pool Security</h6>
                    <span>$30.00</span>
                  </div>
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="latest-product__text">
            <h4>Review Products</h4>
            <div class="latest-product__slider owl-carousel">
              <div class="latest-prdouct__slider__item">
                <a href="#" class="latest-product__item">
                  <div class="latest-product__item__pic">
                    <img src="img/latest-product/lp-1.jpg" alt="">
                  </div>
                  <div class="latest-product__item__text">
                    <h6>Crab Pool Security</h6>
                    <span>$30.00</span>
                  </div>
                </a>
                <a href="#" class="latest-product__item">
                  <div class="latest-product__item__pic">
                    <img src="img/latest-product/lp-2.jpg" alt="">
                  </div>
                  <div class="latest-product__item__text">
                    <h6>Crab Pool Security</h6>
                    <span>$30.00</span>
                  </div>
                </a>
                <a href="#" class="latest-product__item">
                  <div class="latest-product__item__pic">
                    <img src="img/latest-product/lp-3.jpg" alt="">
                  </div>
                  <div class="latest-product__item__text">
                    <h6>Crab Pool Security</h6>
                    <span>$30.00</span>
                  </div>
                </a>
              </div>
              <div class="latest-prdouct__slider__item">
                <a href="#" class="latest-product__item">
                  <div class="latest-product__item__pic">
                    <img src="img/latest-product/lp-1.jpg" alt="">
                  </div>
                  <div class="latest-product__item__text">
                    <h6>Crab Pool Security</h6>
                    <span>$30.00</span>
                  </div>
                </a>
                <a href="#" class="latest-product__item">
                  <div class="latest-product__item__pic">
                    <img src="img/latest-product/lp-2.jpg" alt="">
                  </div>
                  <div class="latest-product__item__text">
                    <h6>Crab Pool Security</h6>
                    <span>$30.00</span>
                  </div>
                </a>
                <a href="#" class="latest-product__item">
                  <div class="latest-product__item__pic">
                    <img src="img/latest-product/lp-3.jpg" alt="">
                  </div>
                  <div class="latest-product__item__text">
                    <h6>Crab Pool Security</h6>
                    <span>$30.00</span>
                  </div>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Latest Product Section End -->

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
        <div class="col-lg-4 col-md-4 col-sm-6">
          <div class="blog__item">
            <div class="blog__item__pic">
              <img src="img/blog/blog-1.jpg" alt="">
            </div>
            <div class="blog__item__text">
              <ul>
                <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                <li><i class="fa fa-comment-o"></i> 5</li>
              </ul>
              <h5><a href="#">Cooking tips make cooking simple</a></h5>
              <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6">
          <div class="blog__item">
            <div class="blog__item__pic">
              <img src="img/blog/blog-2.jpg" alt="">
            </div>
            <div class="blog__item__text">
              <ul>
                <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                <li><i class="fa fa-comment-o"></i> 5</li>
              </ul>
              <h5><a href="#">6 ways to prepare breakfast for 30</a></h5>
              <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6">
          <div class="blog__item">
            <div class="blog__item__pic">
              <img src="img/blog/blog-3.jpg" alt="">
            </div>
            <div class="blog__item__text">
              <ul>
                <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                <li><i class="fa fa-comment-o"></i> 5</li>
              </ul>
              <h5><a href="#">Visit the clean farm in the US</a></h5>
              <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Blog Section End -->

  @include('client.section.footer')

  <!-- Js Plugins -->
  @include('client.common.plugin')
</body>

</html>