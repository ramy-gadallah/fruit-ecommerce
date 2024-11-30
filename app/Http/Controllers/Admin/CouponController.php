<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\couponRequest;
use App\Models\Coupon;
use Illuminate\Http\Request;
use App\Services\admin\CouponService as ObjService;
class CouponController extends Controller
{
    public function __construct(protected ObjService $ObjService){

    }

    public function index(Request $request)
    {
        return $this->ObjService->index($request);
    }


    public function create()
    {
        return $this->ObjService->create();
    }


    public function store(couponRequest $request)
    {
        return $this->ObjService->store($request->all());
    }


    public function show(Coupon $coupon)
    {
        //
    }


    public function edit(Coupon $coupon)
    {
        return $this->ObjService->edit($coupon);
    }


    public function update(couponRequest $request, $id)
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
