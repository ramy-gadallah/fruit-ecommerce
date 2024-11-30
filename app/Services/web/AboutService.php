<?php

namespace App\Services\web;

use App\Models\BreadCramb;
use App\Models\Review;
use App\Models\HomeAbout;
use App\Models\Team;

class AboutService
{

    public function index()
    {
        $review = Review::get();
        $home_about = HomeAbout::first();
        $team = Team::limit(3)->get();
        $breadcrumb = BreadCramb::where('page', 'about')->where('status', 1)->first();
        return view('web.about.index',
            [
                'reviews' => $review,
                'home_about' => $home_about,
                'teams' => $team,
                'breadcrumb' => $breadcrumb
            ]
        );
    }
}
