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
  @include('admin.message')
  <!-- Breadcrumb Section Begin -->
  <section class="breadcrumb-section set-bg" data-setbg="{{ asset('dist/img/banner/breadcrumb.jpg') }}">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <div class="breadcrumb__text">
            <h2>Contact Us</h2>
            <div class="breadcrumb__option">
              <a href="./index.html">Home</a>
              <span>Contact Us</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Breadcrumb Section End -->

  <!-- Contact Section Begin -->
  <section class="contact spad">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-6 text-center">
          <div class="contact__widget">
            <span class="icon_phone"></span>
            <h4>Phone</h4>
            <p>+84.123.456.789</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 text-center">
          <div class="contact__widget">
            <span class="icon_pin_alt"></span>
            <h4>Address</h4>
            <p>Hoang Mai, Ha Noi, Viet Nam</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 text-center">
          <div class="contact__widget">
            <span class="icon_clock_alt"></span>
            <h4>Open time</h4>
            <p>09:00 AM to 10:00 PM</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 text-center">
          <div class="contact__widget">
            <span class="icon_mail_alt"></span>
            <h4>Email</h4>
            <p>tngreenshop@company.vn</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Contact Section End -->

  <!-- Map Begin -->
  <div class="map">
    <iframe
      src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=Nguy%E1%BB%85n%20%C4%91%E1%BB%A9c%20c%E1%BA%A3nh%20h%C3%A0%20n%E1%BB%99i+(My%20Business%20Name)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"
      height="500" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
  </div>
  <!-- Map End -->

  <!-- Contact Form Begin -->
  <div class="contact-form spad">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="contact__form__title">
            <h2>Liên hệ với chúng tôi</h2>
          </div>
        </div>
      </div>
      <form action="{{ action('ContactController@store') }}" method="POST">
        @csrf
        <div class="row">
          <div class="col-lg-6 col-md-6">
            <input type="text" placeholder="Your name" name="name" value="{{ old('name') }}" required>
          </div>
          <div class="col-lg-6 col-md-6">
            <input type="email" placeholder="Your Email" name="email" value="{{ old('email') }}" required>
          </div>
          <div class="col-lg-12 text-center">
            <textarea placeholder="Your message" name="message">{{ old('message') }}</textarea>
            <button type="submit" class="site-btn">SEND MESSAGE</button>
          </div>
        </div>
      </form>
    </div>
  </div>
  <!-- Contact Form End -->

  @include('client.section.footer')

  <!-- Js Plugins -->
  @include('client.common.plugin')
</body>

</html>