<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\UnitRequest;
use App\Models\Unit;
use Illuminate\Http\Request;
use App\Services\admin\UnitService as ObjService;

class UnitController extends Controller
{

    public function __construct(protected ObjService $objService)
    {

    }

    public function index(Request $request)
    {
        return $this->objService->index($request);
    }


    public function create()
    {
        return $this->objService->create();
    }


    public function store(UnitRequest $request)
    {
        $data=$request->validated();
        return $this->objService->store($data);
    }


    public function show(Unit $unit)
    {
        //
    }


    public function edit(Unit $unit)
    {
        return $this->objService->edit($unit);
    }


    public function update(UnitRequest $request, $id)
    {
        $data=$request->validated();
        return $this->objService->update($id,$data);
    }


    public function destroy($id)
    {
        return $this->objService->destroy($id);
    }

    public function changeStatus(Request $request)
    {
        return $this->objService->changeStatus($request);
    }
}
