<?php

namespace App\Services\web;

use App\Models\Blog;
use App\Models\Deal;
use App\Models\HomeAbout;
use App\Models\Product;
use App\Models\Review;
use App\Models\Slider;

class HomeService
{
    protected $folder='web.home';



    public function index()
    {
        $product=Product::where('status',1)->limit(3)->get();
        $slider=Slider::first();
        $review=Review::get();
        $deal=Deal::first();
        $home_about=HomeAbout::first();
        $blog=Blog::get();
        return view($this->folder.'.index',[
            'products'=>$product,
            'slider'=>$slider,
            'reviews'=>$review,
            'deal'=>$deal,
            'home_about'=>$home_about,
            'blogs'=>$blog
        ]);
    }
}
