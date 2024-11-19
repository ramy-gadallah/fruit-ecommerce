<?php

namespace App\Services\web;
use App\Services\BaseService;
use App\Models\Cart as ObjModel;
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
        return view($this->folder.'.index',[
            'products'=>$product,
            'slider'=>$slider,
            'reviews'=>$review
        ]);
    }
}
