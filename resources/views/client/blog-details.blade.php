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

  <!-- Blog Details Hero Begin -->
  <section class="blog-details-hero set-bg" data-setbg="{{ asset('dist/img/banner/bannertree_tintuc.jpg') }}">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="blog__details__hero__text">
            <h2>{{$blog->title}}</h2>
            <ul>
              <li>{{ date('d/m/Y', strtotime($blog->created_at)) }}</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Blog Details Hero End -->

  <!-- Blog Details Section Begin -->
  <section class="blog-details spad">
    <div class="container">
      <div class="row">        
        <div class="col-12">
          <div class="blog__details__text">
            <div class="text-center">
              <img src="{{ asset('storage'.$blog->featured_image) }}" alt="">
            </div>
            {!! $blog->content !!}
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Blog Details Section End -->

  <!-- Related Blog Section Begin -->
  <section class="related-blog spad">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="section-title related-blog-title">
            <h2>Các bài viết khác</h2>
          </div>
        </div>
      </div>
      <div class="row">
        @foreach($moreBlogs as $blog)
        <div class="col-lg-4 col-md-4 col-sm-6">
          <div class="blog__item">
            <div class="blog__item__pic">
              <img src="{{ asset('storage'.$blog->featured_image) }}" alt="">
            </div>
            <div class="blog__item__text">
              <ul>
                <li><i class="fa fa-calendar-o"></i> {{ date('d/m/Y', strtotime($blog->created_at)) }}</li>
              </ul>
              <h5><a href="{{ route('client_blog_detail', $blog->id) }}">{{ $blog->title }}</a></h5>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>
  <!-- Related Blog Section End -->

  @include('client.section.footer')

  <!-- Js Plugins -->
  @include('client.common.plugin')



</body>

</html>