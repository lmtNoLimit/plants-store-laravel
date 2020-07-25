<div class="humberger__menu__overlay"></div>
<div class="humberger__menu__wrapper">
  <div class="humberger__menu__logo">
    <a href="{{ route('homepage') }}"><img src="{{ asset('dist/img/logo.svg') }}" alt="Logo" width="120"></a>
  </div>
  <div class="humberger__menu__cart">
    <ul>
      <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
      <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
    </ul>
  </div>
  <div class="humberger__menu__widget">
    <div class="header__top__right__language">
      <div>English</div>
      <span class="arrow_carrot-down"></span>
      <ul>
        <li><a href="#">Vietnamese</a></li>
        <li><a href="#">English</a></li>
      </ul>
    </div>
    <div class="header__top__right__auth">
      <a href="/login"><i class="fa fa-user"></i> Login</a>
    </div>
  </div>
  <nav class="humberger__menu__nav mobile-menu">
    <ul>
      <li class="active"><a href="{{ route('homepage') }}">Home</a></li>
      <li><a href="{{ route('client_shop') }}">Shop</a></li>
      <li><a href="{{ route('client_blogs') }}">Blog</a></li>
      <li><a href="{{ route('client_contact_form') }}">Contact</a></li>
    </ul>
  </nav>
  <div id="mobile-menu-wrap"></div>
  <div class="header__top__right__social">
    <a href="#"><i class="fa fa-facebook"></i></a>
    <a href="#"><i class="fa fa-twitter"></i></a>
    <a href="#"><i class="fa fa-linkedin"></i></a>

  </div>
  <div class="humberger__menu__contact">
    <ul>
      <li><i class="fa fa-envelope"></i> nkn19991101@gmail.com</li>
      <li>Free Shipping for all Order of $99</li>
    </ul>
  </div>
</div>