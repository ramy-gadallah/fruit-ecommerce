<?php

namespace App\Services\web;

use App\Models\BreadCramb;
use App\Services\BaseService;
use App\Models\Cart as ObjModel;
use App\Models\Product;

class CartService extends BaseService
{
    protected $folder='web.cart';

    public function __construct(ObjModel $model)
    {
        parent::__construct($model);
    }

    public function index()
    {
        $cartItems = $this->model->where('user_id', auth()->user()->id)->get();
        $breadcrumb=BreadCramb::where('page','carts')->where('status',1)->first();
        return view($this->folder.'.index',compact('breadcrumb','cartItems'));
    }

    public function addToCart($request)
    {
        $request['user_id'] = auth()->user()->id;

        // Check if the product is already in the cart
        $obj = $this->model->where('product_id', $request['product_id'])
            ->where('user_id', $request['user_id'])
            ->first();

        // If product exists, increment the quantity
        if ($obj) {
            $this->model->where('product_id', $request['product_id'])
                ->where('user_id', $request['user_id'])
                ->increment('quantity', $request['quantity']); // Increase quantity
            session()->flash('success', 'المنتج موجود بالفعل تم زيادة الكمية بنجاح');
        } else {
            // If product does not exist, add new product to cart
            $this->createData($request);
            session()->flash('success', 'تم إضافة المنتج بنجاح');
        }

        return redirect()->back();
    }


}
