<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Services\web\AboutService as ObjService;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function __construct(protected ObjService $objService){

    }
    public function index(){
        return $this->objService->index();
    }
}
