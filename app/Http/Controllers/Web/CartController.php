<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Services\web\CartService as ObjService;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function __construct(protected ObjService $objService){

    }

    public function index(){
        return $this->objService->index();
    }

    public function addToCart(Request $request){

        return $this->objService->addToCart($request->all());
    }
}
