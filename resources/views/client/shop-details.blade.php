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

  <!-- Product Details Section Begin -->
  <section class="product-details spad">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-md-6">
          <div class="product__details__pic">
            <div class="product__details__pic__item">
              <img class="product__details__pic__item--large" src="{{ asset('storage'.$product->images[0]->image) }}" alt="">
            </div>
            <div class="product__details__pic__slider owl-carousel">
              @foreach($product->images as $image)
              <img data-imgbigurl="{{ asset('storage'.$image->image) }}" src="{{ asset('storage'.$image->image) }}"
                alt="">
              @endforeach
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-6">
          <div class="product__details__text">
            <h3>{{ $product->name }}</h3>
            <div class="product__details__rating">
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star-half-o"></i>
              <span>(18 reviews)</span>
            </div>
            @if(isset($product->sale_price))
            <div class="product__details__price">
              <del class="text-dark">@money($product->price, 'VND')</del>
              @money($product->sale_price, 'VND')
            </div>
            @else
            <div class="product__details__price">
              @money($product->price, 'VND')
            </div>
            @endif
            <p>{{ $product->description }}</p>
            <form action="{{ action('Client\CartController@addToCart', $product->id) }}" class="d-inline" method="POST">
              @csrf
              <div class="product__details__quantity">
                <div class="quantity">
                  <div class="pro-qty">
                    <input type="text" name="quantity" value="1">
                  </div>
                </div>
              </div>
              <button class="btn primary-btn">THÊM VÀO GIỎ</button>
              <a href="#" class="heart-icon"><span class="icon_heart_alt"></span></a>
            </form>
            <ul>
              <li><b>Availability</b> <span>In Stock</span></li>
              <li><b>Shipping</b> <span>01 day shipping. <samp>Free pickup today</samp></span></li>
              <li><b>Weight</b> <span>0.5 kg</span></li>
              <li><b>Share on</b>
                <div class="share">
                  <a href="#"><i class="fa fa-facebook"></i></a>
                  <a href="#"><i class="fa fa-twitter"></i></a>
                  <a href="#"><i class="fa fa-instagram"></i></a>
                  <a href="#"><i class="fa fa-pinterest"></i></a>
                </div>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="product__details__tab">
            <ul class="nav nav-tabs" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab"
                  aria-selected="true">Description</a>
              </li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tabs-1" role="tabpanel">
                <div class="product__details__tab__desc">
                  <p>{{$product->description}}</p>
                </div>
              </div>
              <div class="tab-pane" id="tabs-2" role="tabpanel">
                <div class="product__details__tab__desc">
                  <h6>Products Infomation</h6>
                  <p>Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.
                    Pellentesque in ipsum id orci porta dapibus. Proin eget tortor risus.
                    Vivamus suscipit tortor eget felis porttitor volutpat. Vestibulum ac diam
                    sit amet quam vehicula elementum sed sit amet dui. Donec rutrum congue leo
                    eget malesuada. Vivamus suscipit tortor eget felis porttitor volutpat.
                    Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Praesent
                    sapien massa, convallis a pellentesque nec, egestas non nisi. Vestibulum ac
                    diam sit amet quam vehicula elementum sed sit amet dui. Vestibulum ante
                    ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;
                    Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula.
                    Proin eget tortor risus.</p>
                  <p>Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Lorem
                    ipsum dolor sit amet, consectetur adipiscing elit. Mauris blandit aliquet
                    elit, eget tincidunt nibh pulvinar a. Cras ultricies ligula sed magna dictum
                    porta. Cras ultricies ligula sed magna dictum porta. Sed porttitor lectus
                    nibh. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Product Details Section End -->

  <!-- Related Product Section Begin -->
  @if(sizeof($relatedProducts) > 0)
  <section class="related-product">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="section-title related__product__title">
            <h2>Related Product</h2>
          </div>
        </div>
      </div>
      <div class="row">
        @foreach($relatedProducts as $product)
        <div class="col-lg-3 col-md-4 col-sm-6">
          <div class="product__item">
            <div class="product__item__pic set-bg" data-setbg="{{ asset('storage'.$product->images[0]->image) }}">
              <ul class="product__item__pic__hover">
                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
              </ul>
            </div>
            <div class="product__item__text">
              <h6>
                <a href="{{ route('client_product_detail', $product->id) }}">
                  {{ $product->name }}
                </a>
              </h6>
              <h5>@money($product->price, 'VND')</h5>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>
  @endif
  <!-- Related Product Section End -->

  @include('client.section.footer')

  {{-- js plugin --}}
  @include('client.common.plugin')

</body>

</html>