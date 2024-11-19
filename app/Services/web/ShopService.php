<?php

namespace App\Services\web;

use App\Models\Product;
use App\Services\BaseService;
// use App\Models\Cart as ObjModel;


class ShopService
// extends BaseService
{
    protected $folder='web.shop';

    // public function __construct(ObjModel $model)
    // {
    //     parent::__construct($model);
    // }

    public function index()
    {
        $product=Product::where('status',1)->get();
        return view($this->folder.'.index',[
            'products'=>$product
        ]);
    }
}
