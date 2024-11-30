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
                    <p>Best Team in the World</p>
                    <h1>Team</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end breadcrumb section -->

<!-- team section -->
   <div class="mt-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="section-title">
                    <h3>Good <span class="orange-text">Employees</span></h3>
                    <p>{{ ucwords('the best employees of this year demonstrated exceptional dedication and innovation in their work.') }}</p>
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
                            <li><a href="{{ $team->facebook }}" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="{{ $team->twitter }}" target="_blank"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="{{ $team->instagram }}" target="_blank"><i class="fab fa-instagram"></i></a></li>
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
@endsection
