<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\SliderRequest;
use App\Models\Slider;
use Illuminate\Http\Request;
use App\Services\admin\SliderService as ObjService;
use App\Services\admin\SliderService;

class SliderController extends Controller
{
    public function __construct(protected ObjService $objService)
    {

    }

    public function index(Request $request)
    {
        return $this->objService->index($request);
    }

    public function update(SliderRequest $request)
    {
        $data=$request->validated();
        return $this->objService->update($data);
    }

}
