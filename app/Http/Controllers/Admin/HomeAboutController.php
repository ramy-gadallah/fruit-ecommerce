<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\HomeAboutRequest;
use Illuminate\Http\Request;
use App\Services\admin\HomeAboutService as ObjService;

class HomeAboutController extends Controller
{
    public function __construct(protected ObjService $objService) {}
    public function index(Request $request)
    {
        return $this->objService->index($request);
    }

    public function update(HomeAboutRequest $request)
    {
        return $this->objService->update($request->all());
    }

}
