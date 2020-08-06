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
            <h2>Tin tức</h2>
            <div class="breadcrumb__option">
              <a href="{{ route('homepage') }}">Trang chủ</a>
              <span>Tin tức</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Breadcrumb Section End -->

  <!-- Blog Section Begin -->
  <section class="blog spad">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-5">
          <div class="blog__sidebar">
            @if(sizeof($recentBlogs) > 0)
            <div class="blog__sidebar__item">
              <h4>Bài viết gần đây</h4>
              <div class="blog__sidebar__recent">
                @foreach($recentBlogs as $blog)
                <a href="#" class="blog__sidebar__recent__item">
                  <div class="blog__sidebar__recent__item__pic">
                    <img src="{{asset('storage'.$blog->featured_image)}}" alt="" width="80">
                  </div>
                  <div class="blog__sidebar__recent__item__text">
                    <h6>{{$blog->title}}</h6>
                    <span>{{ date('d/m/Y', strtotime($blog->created_at)) }}</span>
                  </div>
                </a>
                @endforeach
              </div>
            </div>
            @endif
          </div>
        </div>
        <div class="col-lg-8 col-md-7">
          <div class="row">
            @foreach($latestBlogs as $blog)
            <div class="col-lg-6 col-md-6 col-sm-6">
              <div class="blog__item">
                <div class="blog__item__pic">
                  <img src="{{ asset('storage'.$blog->featured_image) }}" alt="{{$blog->title}}" width="290">
                </div>
                <div class="blog__item__text">
                  <ul>
                    <li>
                      <i class="fa fa-calendar-o"></i>
                      {{ date('d/m/Y', strtotime($blog->created_at)) }}
                    </li>
                  </ul>
                  <h5><a href="{{ route('client_blog_detail', $blog->id) }}">{{$blog->title}}</a></h5>
                  <p class="text-truncate">{{$blog->description}}</p>
                  <a href="{{ route('client_blog_detail', $blog->id) }}" class="blog__btn">
                    Xem thêm <span class="arrow_right"></span>
                  </a>
                </div>
              </div>
            </div>
            @endforeach
            <div class="col-lg-12">
              {{ $latestBlogs->links() }}
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