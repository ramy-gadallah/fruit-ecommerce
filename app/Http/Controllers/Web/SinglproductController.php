<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Services\web\SinglproductService as ObjService;
use Illuminate\Http\Request;

class SinglproductController extends Controller
{
    public function __construct(protected ObjService $objService){

    }
    public function index($id){
        return $this->objService->index($id);
    }
}
