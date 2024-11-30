<?php

namespace App\Services\web;

use App\Models\BreadCramb;
use App\Services\BaseService;
use App\Models\Cart as ObjModel;
use App\Models\Product;

class SinglproductService extends BaseService
{
    protected $folder='web.shop';

    public function __construct(ObjModel $model)
    {
        parent::__construct($model);
    }

    public function index($id)
    {
        $product=Product::find($id);
        $product_related=Product::where('category_id',$product->category_id)
        ->where('status',1)
        ->where('id','!=',$product->id)
        ->get();

        // dd($product_related);
        $breadcrumb=BreadCramb::where('page','single_product')->where('status',1)->first();
        return view($this->folder.'.single_product',compact('breadcrumb','product','product_related'));
    }
}
