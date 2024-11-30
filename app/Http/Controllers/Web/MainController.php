<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Services\web\MainService as ObjService;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function __construct(protected ObjService $objService) {}

    public function register(){
        return $this->objService->register();
    }
    public function doRegister(UserRequest $request){
        return $this->objService->doRegister($request->all());
    }

    public function login(Request $request)
    { {
            return $this->objService->login($request);
        }
    }

    public function doLogin(Request $request)
    {
        return $this->objService->doLogin($request);
    }

    public function logout()
    {
        return $this->objService->logout();
    }
}
