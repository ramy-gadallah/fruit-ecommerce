<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\PartnerRequest;
use App\Models\Partner;
use Illuminate\Http\Request;
use App\Services\admin\PartnerService as ObjService;

class PartnerController extends Controller
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


    public function store(PartnerRequest $request)
    {
        return $this->ObjService->store($request->all());
    }


    public function show(Partner $partner)
    {
        //
    }


    public function edit(Partner $partner)
    {
        return $this->ObjService->edit($partner);
    }


    public function update(PartnerRequest $request, $id)
    {
        return $this->ObjService->update($id, $request->all());
    }


    public function destroy($id)
    {
        return $this->ObjService->destroy($id);
    }

    public function changeStatus(Request $request){
        return $this->ObjService->changeStatus($request);
    }
}
