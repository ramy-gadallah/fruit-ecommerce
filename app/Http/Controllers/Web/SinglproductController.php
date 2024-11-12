<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SinglproductController extends Controller
{

    public function index(){
        return view('web.single_product.index');
    }
}
