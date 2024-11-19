<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Services\web\MainService as ObjService;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function __construct(protected ObjService $objService) {}
    public function index()
    {
        return '12';
        return $this->objService->index();
    }

    public function login(Request $request)
    { {
            return 123;
            return $this->objService->login($request);
        }
    }
}
