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

  <!-- Shoping Cart Section Begin -->
  <section class="shoping-cart spad">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="shoping__cart__table">
            <table>
              <thead>
                <tr>
                  <th class="shoping__product">Sản phẩm</th>
                  <th>Thành tiền</th>
                  <th>Số lượng</th>
                  <th>Tổng cộng</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach($cartDetails as $cartItem)
                <tr>
                  <td class="shoping__cart__item">
                    <img src="{{ asset('storage'.$cartItem->product->images[0]->image) }}" alt="" width="80" height="80">
                    <h5>{{ $cartItem->product->name }}</h5>
                  </td>
                  <td class="shoping__cart__price">
                    @money($cartItem->product->price, 'VND')
                  </td>
                  <td class="shoping__cart__quantity">
                    <div class="quantity">
                      <div class="pro-qty">
                        <input type="text" name="quantity{{$cartItem->product->id}}" value="{{ $cartItem->quantity }}">
                      </div>
                    </div>
                  </td>
                  <td class="shoping__cart__total">
                    @money($cartItem->product->price * $cartItem->quantity, 'VND')
                  </td>
                  <td class="shoping__cart__item__close">
                    <form action="{{ action('Client\CartController@removeItemFromCart', $cartItem->product->id) }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="border-0" style="background: transparent;">
                        <span class="icon_close"></span>
                      </button>
                    </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <div class="shoping__cart__btns">
            <a href="{{ route('client_shop') }}" class="primary-btn cart-btn">Tiếp tục mua hàng</a>
            <form action="{{ action('Client\CartController@updateCart') }}" method="POST">
              @csrf
              @method('PUT')
              <button type="submit" class="primary-btn cart-btn cart-btn-right border-0 d-none">
                <span class="icon_loading"></span>
              Cập nhật giỏ hàng</button>
            </form>
          </div>
        </div>
        <div class="col-lg-6">
          
        </div>
        <div class="col-lg-6">
          <div class="shoping__checkout">
            <h5>Tổng cộng</h5>
            <ul>
              @php
                $total = 0;
                for($i = 0; $i < sizeof($cartDetails); $i++) {
                  $total += $cartDetails[$i]->quantity * $cartDetails[$i]->product->price;
                }
              @endphp
              <li>Thành tiền <span>@money($total, 'VND')</span></li>
            </ul>
            <a href="#" class="primary-btn">Thanh toán</a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Shoping Cart Section End -->

  @include('client.section.footer')

  <!-- Js Plugins -->
  @include('client.common.plugin')
</body>

</html>