@extends('web.layouts.master')

@section('content')
    <!-- breadcrumb-section -->
    <div class="breadcrumb-section"
    style="background-image: url({{ isset($breadcrumb->image) ? asset('storage/' . $breadcrumb->image) : asset('web/imsssssg/hero-bg.jpg') }});">

        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="breadcrumb-text">
                        <p>We sale fresh fruits</p>
                        <h1>About Us</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end breadcrumb section -->

    <!-- featured section -->
    <div class="feature-bg">
        <div class="container">

            <!-- advertisement section -->
            <div class="abt-section mb-150">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <div class="abt-bg"
                                style="background-image: url({{ isset($home_about->image) ? asset('storage/' . $home_about->image) : asset('web/img/abt.jpg') }});">
                                <a href="{{ isset($home_about->link) ? $home_about->link : 'https://www.youtube.com/watch?v=DBLlFWYcIGQ' }}"
                                    class="video-play-btn popup-youtube">
                                    <i class="fas fa-play"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="abt-text">
                                <p class="top-sub">
                                    {{ isset($home_about->title) ? $home_about->title : trns('title default') }}</p>
                                <h2><span
                                        class="orange-text">{{ isset($home_about->subtitle) ? $home_about->subtitle : trns('subtitle default') }}</span>
                                </h2>
                                <p>{{ isset($home_about->description) ? $home_about->description : trns('description default') }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- end advertisement section -->
        </div>
    </div>
    <!-- end featured section -->



    <!-- team section -->
    <div class="mt-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="section-title">
                        <h3>Best <span class="orange-text">Employees</span></h3>
                        <p>{{ ucwords('the best employees of this year demonstrated exceptional dedication and innovation in their work.') }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                @forelse ($teams as $team)
                    <div class="col-lg-4 col-md-6">
                        <div class="single-team-item">
                            <div class="team-bg"
                                style="background-image: url({{ isset($team->image) ? asset('storage/' . $team->image) : asset('web/img/team/team-1.jpg') }});">
                            </div>
                            <h4>{{ $team->name }} <span>{{ $team->position }}</span></h4>
                            <ul class="social-link-team">
                                <li><a href="{{ $team->facebook_url }}" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="{{ $team->twitter_url }}" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="{{ $team->instagram_url }}" target="_blank"><i class="fab fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                @empty
                    <div class="col-lg-12">
                        <div class="col-lg-4 col-md-6">
                            <div class="single-team-item">
                                <div class="team-bg"
                                    style="background-image: url({{ isset($team->image) ? asset('storage/' . $team->image) : asset('web/img/team/team-1.jpg') }});">
                                </div>
                                <h4>Jimmy Doe <span>Farmer</span></h4>
                                <ul class="social-link-team">
                                    <li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforelse
            </div>

        </div>
    </div>
    <!-- end team section -->

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
@endsection
