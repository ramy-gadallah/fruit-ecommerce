@extends('web.layouts.master')

@section('content')
    <!-- breadcrumb-section -->
    <div class="breadcrumb-section breadcrumb-bg"
    style="background-image: url({{ isset($breadcrumb->image) ? asset('storage/' . $breadcrumb->image) : asset('web/imsssssg/hero-bg.jpg') }});">

    >
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="breadcrumb-text">
                        <p>Organic Information</p>
                        <h1>News Article</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end breadcrumb section -->

    <!-- latest news -->
    <div class="latest-news mt-150 mb-150">
        <div class="container">

            <div class="row">
                @foreach ($blogs as $blog)
                <div class="col-lg-4 col-md-6">
                    <div class="single-latest-news">
                        <a href="{{ route('web.single_news.index',$blog->id) }}">
                            <div class="latest-news-bg news-bg-{{$loop->iteration}}"
                            style="background-image:urls({{ asset('storage/' .$blog->image) }});"
                            ></div>
                        </a>
                        <div class="news-text-box">
                            <h3><a href="{{ route('web.single_news.index',$blog->id) }}">{{ $blog->title }}</a></h3>
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

            <div class="row">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <div class="pagination-wrap">
                                <ul>
                                    <li><a href="#">Prev</a></li>
                                    <li><a class="active" href="#">1</a></li>
                                    <li><a  href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">Next</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end latest news -->
@endsection
