@extends('web.layouts.master')

@section('content')
    <!-- hero area -->
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

    <div class="hero-area hero-bg"
        style="background-image: url({{ isset($slider->image) ? asset('storage/' . $slider->image) : asset('web/imsssssg/hero-bg.jpg') }});">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 offset-lg-2 text-center">
                    <div class="hero-text">
                        <div class="hero-text-tablecell" style="background-image: url)">
                            <p class="subtitle">{{ isset($slider->title) ? $slider->title : trns('titl default') }}</p>
                            <p class="subtitle">
                                {{ isset($slider->description) ? $slider->description : trns('description default') }}</p>
                            <div class="hero-btns">
                                <a href="{{ route('web.shop.index') }}" class="boxed-btn">Fruit Collection</a>
                                <a href="{{ route('web.contact.index') }}" class="bordered-btn">Contact Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end hero area -->

    <!-- features list section -->
    <div class="list-section pt-80 pb-80">
        <div class="container">

            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                    <div class="list-box d-flex align-items-center">
                        <div class="list-icon">
                            <i class="fas fa-shipping-fast"></i>
                        </div>
                        <div class="content">
                            <h3>Free Shipping</h3>
                            <p>When order over $75</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                    <div class="list-box d-flex align-items-center">
                        <div class="list-icon">
                            <i class="fas fa-phone-volume"></i>
                        </div>
                        <div class="content">
                            <h3>24/7 Support</h3>
                            <p>Get support all day</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="list-box d-flex justify-content-start align-items-center">
                        <div class="list-icon">
                            <i class="fas fa-sync"></i>
                        </div>
                        <div class="content">
                            <h3>Refund</h3>
                            <p>Get refund within 3 days!</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- end features list section -->

    <!-- product section -->
    <div class="product-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="section-title">
                        <h3><span class="orange-text">Our</span> Products</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, fuga quas itaque eveniet
                            beatae optio.</p>
                    </div>
                </div>
            </div>

            <div class="row">
                @foreach ($products as $product)
                    <div class="col-lg-4 col-md-6 text-center">
                        <div class="single-product-item">
                            <div class="product-image">
                                <a href="{{ route('web.single_product.index',$product->id) }}"><img
                                        src="{{ asset('storage/' . $product->image) }}" alt=""></a>
                            </div>
                            <h3>{{ $product->name }}</h3>
                            <p class="product-price"><span>Per {{ $product->unit->name }}</span> {{ $product->price }}$ </p>
                            <a href="{{ route('web.cart.index',$product->id) }}" class="cart-btn"><i class="fas fa-shopping-cart"></i>
                                Add to Cart</a>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
    </div>
    <!-- end product section -->


    @if ($deal->counter > Carbon\Carbon::now())
    <!-- cart banner section -->
    <section class="cart-banner pt-100 pb-100">
        <div class="container">
            <div class="row clearfix">
                <!--Image Column-->
                <div class="image-column col-lg-6">
                    <div class="image">
                        <div class="price-box">
                            <div class="inner-price">
                                <span class="price">
                                    <strong>{{ $deal->discount }}%</strong> <br> off per {{ $deal->product->unit->name }}
                                </span>
                            </div>
                        </div>
                        <img src="{{ asset('storage/' . $deal->image) }}">
                    </div>
                </div>
                <!--Content Column-->
                <div class="content-column col-lg-6">
                    <h3><span class="orange-text">Deal</span> {{ $deal->title }}</h3>
                    <h4>$ {{ $deal->subtitle }}</h4>
                    <div class="text">{{ $deal->description }}</div>
                    <!--Countdown Timer-->
                    <div class="time-counter">
                        <div class="time-countdown clearfix"
                            data-countdown="{{ Carbon\Carbon::parse($deal->counter)->format('Y/m/d H:i:s') }}">
                            <div class="counter-column">
                                <div class="inner">
                                    <span class="count">{{ Carbon\Carbon::parse($deal->counter)->format('d') }}</span>Days
                                </div>
                            </div>
                            <div class="counter-column">
                                <div class="inner"><span class="count">88 </span>Hours</div>
                            </div>
                            <div class="counter-column">
                                <div class="inner"><span class="count">00</span>Mins</div>
                            </div>
                            <div class="counter-column">
                                <div class="inner"><span class="count">00</span>Secs</div>
                            </div>
                        </div>
                    </div>
                    <a href="cart.html" class="cart-btn mt-3"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                </div>
            </div>
        </div>
    </section>
    @else
          <!-- Deal Ended Section -->
    <section class="cart-banner pt-100 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h3><span class="orange-text">Deal</span> {{ $deal->title }}</h3>
                    <img src="{{ asset('storage/' . $deal->image) }}" alt="{{ $deal->title }}" style="max-width: 100%; height: auto; margin-bottom: 20px;">
                    <h2>Sorry, <span class="orange-text"> Deal Has Ended!</span> </h5>
                </div>
            </div>
        </div>
    </section>
    @endif
    <!-- end cart banner section -->

    <!-- testimonail-section -->
    <div class="testimonail-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1 text-center">
                    <div class="testimonial-sliders">
                        @foreach ($reviews as $review)
                            <div class="single-testimonial-slider">
                                <div class="client-avater">
                                    <img src="{{ asset('storage/' . $review->image) }}">
                                </div>
                                <div class="client-meta">
                                    <h3>{{ $review->name }} <span>{{ $review->title }}</span></h3>
                                    <p class="testimonial-body">
                                        {{ $review->description }}
                                    </p>
                                    <div class="last-icon">
                                        <i class="fas fa-quote-right"></i>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- end testimonail-section -->

    <!-- advertisement section -->
    <div class="abt-section mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="abt-bg"
                     style="background-image: url({{ isset($home_about->image) ? asset('storage/' . $home_about->image) : asset('web/img/abt.jpg') }});"
                        >
                        <a href="{{ isset($home_about->link) ? $home_about->link : 'https://www.youtube.com/xwatch?v=DBLlFWYcIGQ' }}" class="video-play-btn popup-youtube"><i
                                class="fas fa-play"></i></a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="abt-text">
                        <p class="top-sub">{{isset($home_about->title) ? $home_about->title : trns('title default')}}</p>
                        <h2> <span class="orange-text">{{isset($home_about->subtitle) ? $home_about->subtitle : trns('subtitle default')}}</span></h2>
                        <p>{{isset($home_about->description) ? $home_about->description : trns('description default')}}</p>
                        <a href="{{ route('web.about.index')}}" class="boxed-btn mt-4">know more</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end advertisement section -->

    <!-- shop banner -->
    {{-- <section class="shop-banner">
    <div class="container">
        <h3>December sale is on! <br> with big <span class="orange-text">Discount...</span></h3>
        <div class="sale-percent"><span>Sale! <br> Upto</span>50% <span>off</span></div>
        <a href="shop.html" class="cart-btn btn-lg">Shop Now</a>
    </div>
</section> --}}
    <!-- end shop banner -->

    <!-- latest news -->
    <div class="latest-news pt-150 pb-150">
        <div class="container">

            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="section-title">
                        <h3><span class="orange-text">Our</span> News</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, fuga quas itaque eveniet
                            beatae optio.</p>
                    </div>
                </div>
            </div>

            <div class="row">
                @foreach ($blogs as $blog)
                <div class="col-lg-4 col-md-6">
                    <div class="single-latest-news">
                        <a href="{{ route('web.single_news.index',$blog->id) }}">
                            <div class="latest-news-bg"
                            style="background-image:url({{ asset('storage/' .$blog->image) }});"
                            ></div>
                        </a>
                        <div class="news-text-box">
                            <h3><a href="{{ route('web.single_news.index',$blog->id) }}">{{ $blog->tit }}</a></h3>
                            <p class="blog-meta">
                                <span class="author"><i class="fas fa-user"></i> {{$blog->created_by}}</span>
                                <span class="date"><i class="fas fa-calendar"></i> {{ Carbon\Carbon::parse($blog->date)->format('d M Y') }}</span>
                            </p>
                            <p class="excerpt">{{$blog->description}}</p>
                            <a href="{{ route('web.single_news.index',$blog->id) }}" class="read-more-btn">read more <i
                             class="fas fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </div>
    <!-- end latest news -->
@endsection
