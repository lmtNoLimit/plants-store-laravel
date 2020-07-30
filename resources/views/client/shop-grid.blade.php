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

  <!-- Breadcrumb Section Begin -->
  <section class="breadcrumb-section set-bg" data-setbg="{{ asset('dist/img/banner/breadcrumb.jpg') }}">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <div class="breadcrumb__text">
            <h2>Shop</h2>
            <div class="breadcrumb__option">
              <a href="{{ route('homepage') }}">Home</a>
              <span>Shop</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Breadcrumb Section End -->

  <!-- Product Section Begin -->
  <section class="product spad">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-5">
          <div class="sidebar">
            <div class="sidebar__item">
              <h4>Danh mục</h4>
              <ul>
              @foreach($categories as $category)
                <li>
                  <a href="{{ route('client_shop') }}?category={{$category->slug}}">
                    {{ $category->title }}
                  </a>
                </li>
              @endforeach
              </ul>
            </div>
            <div class="sidebar__item">
              <div class="latest-product__text">
                <h4>Latest Products</h4>
                <div class="latest-product__slider owl-carousel">
                  <div class="latest-prdouct__slider__item">
                    @if(sizeof($products) >= 3)
                      @for($i = 0; $i < 3; $i++)
                      <a href="#" class="latest-product__item">
                        <div class="latest-product__item__pic">
                          @if(count($products[$i]->images) > 0)
                          <img src="{{ asset('storage'.$products[$i]->images[0]->image) }}">
                          @endif
                        </div>
                        <div class="latest-product__item__text">
                          <h6>{{ $products[$i]->name }}</h6>
                          <span>{{ $products[$i]->price }}</span>
                        </div>
                      </a>
                      @endfor
                    @else
                      @foreach($products as $product)
                      <a href="#" class="latest-product__item">
                        <div class="latest-product__item__pic">
                          @if(count($product->images) > 0)
                          <img src="{{ asset('storage'.$product->images[0]->image) }}">
                          @endif
                        </div>
                        <div class="latest-product__item__text">
                          <h6>{{ $product->name }}</h6>
                          <span>{{ $product->price }}</span>
                        </div>
                      </a>
                      @endforeach
                    @endif
                  </div>
                  <div class="latest-prdouct__slider__item">
                    @if(count($products) >= 6)
                      @for($i = 3; $i < 6; $i++)
                      <a href="#" class="latest-product__item">
                        <div class="latest-product__item__pic">
                          @if(count($products[$i]->images) > 0)
                          <img src="{{ asset('storage'.$products[$i]->images[0]->image) }}">
                          @endif
                        </div>
                        <div class="latest-product__item__text">
                          <h6>{{ $products[$i]->name }}</h6>
                          <span>{{ $products[$i]->price }}</span>
                        </div>
                      </a>
                      @endfor
                    @endif
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-9 col-md-7">
          <div class="row justify-content-between">
            <div class="col-lg-4 col-md-5">
              <div class="filter__sort">
                <span>Sort By</span>
                <select>
                  <option value="0">Default</option>
                  <option value="0">Default</option>
                </select>
              </div>
            </div>
            <div class="col-lg-4 col-md-4">
              <div class="filter__found">
                <h6><span>{{ sizeof($products) }}</span> Products found</h6>
              </div>
            </div>
          </div>
          <div class="row">
            @foreach($products as $product)
            <div class="col-lg-4 col-md-6 col-sm-6">
              <div class="product__item">
                <div class="product__item__pic set-bg" data-setbg="{{ asset('storage'.$product->images[0]->image) }}">
                  <ul class="product__item__pic__hover">
                    <li><a href="#"><i class="fa fa-heart"></i></a></li>
                    <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                    <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                  </ul>
                </div>
                <div class="product__item__text">
                  <h6><a href="#">{{ $product->name }}</a></h6>
                  <h5>{{ $product->price }}</h5>
                </div>
              </div>
            </div>
            @endforeach
          <div class="product__pagination">
            {{ $products->links() }}
            <!-- <a href="#"><i class="fa fa-long-arrow-right"></i></a> -->
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Product Section End -->

  @include('client.section.footer')

  <!-- Js Plugins -->
  @include('client.common.plugin')
</body>

</html>