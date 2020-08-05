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

  <!-- Checkout Section Begin -->
  <section class="checkout spad pt-5">
    <div class="container">
      <div class="checkout__form">
        <h4>Thông tin thanh toán</h4>
        <form action="{{ action('Client\CartController@checkout') }}" method="POST">
          @csrf
          <div class="row">
            <div class="col-lg-8 col-md-6">
              <div class="checkout__input">
                <p>Họ và tên<span>*</span></p>
                <input type="text" required placeholder="Họ và tên" name="name" value="{{ auth()->user()->name }}" required>
              </div>
              <div class="checkout__input">
                <p>Địa chỉ giao hàng<span>*</span></p>
                <input type="text" placeholder="Nhập địa chỉ giao hàng" name="address" class="checkout__input__add" required>
              </div>
              <div class="row">
                <div class="col-lg-6">
                  <div class="checkout__input">
                    <p>Điện thoại<span>*</span></p>
                    <input type="text" name="phone" value="{{ auth()->user()->phone }}" required>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="checkout__input">
                    <p>Email</p>
                    <input type="text" name="email" value="{{ auth()->user()->email }}" required>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6">
              <div class="checkout__order">
                <h4>Đơn hàng của bạn</h4>
                <div class="checkout__order__products">Sản phẩm <span>Tổng cộng</span></div>
                <ul>
                  @foreach($cartDetails as $cartItem)
                  <li>{{$cartItem->product->name}} <span>@money($cartItem->product->price * $cartItem->quantity, 'VND')</span></li>
                  @endforeach
                </ul>
                @php
                  $total = 0;
                  for($i = 0; $i < sizeof($cartDetails); $i++) {
                    $total += $cartDetails[$i]->quantity * $cartDetails[$i]->product->price;
                  }
                @endphp
                <div class="checkout__order__subtotal">Thành tiền <span>@money($total, 'VND')</span></div>
                <div class="checkout__order__total">Tổng cộng <span>@money($total, 'VND')</span></div>
                <button type="submit" class="site-btn">Đặt hàng</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </section>
  <!-- Checkout Section End -->

  @include('client.section.footer')

  <!-- Js Plugins -->
  @include('client.common.plugin')


</body>

</html>