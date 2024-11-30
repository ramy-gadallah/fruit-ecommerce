<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\breadCrumbRequest;
use App\Models\BreadCramb as BreadCramb;
use Illuminate\Http\Request;
use App\Services\admin\breadCrumbService as ObjService;

class BreadCrambController extends Controller
{
    public function __construct(protected ObjService $ObjService)
    {
    }

    public function index(Request $request)
    {
        return $this->ObjService->index($request);
    }


    public function create()
    {
        return $this->ObjService->create();
    }


    public function store(breadCrumbRequest $request)
    {
        return $this->ObjService->store($request->all());
    }


    public function show(BreadCramb $breadCramb)
    {
        //
    }


    public function edit($id)
    {
        return $this->ObjService->edit($id);
    }


    public function update(breadCrumbRequest $request ,$id)
    {
        return $this->ObjService->update($id,$request->all());
    }


    public function destroy($id)
    {
            return $this->ObjService->destroy($id);
    }

    public function changeStatus(Request $request){
        return $this->ObjService->changeStatus($request);
    }
}
