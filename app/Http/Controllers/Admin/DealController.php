<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\DealRequest;
use App\Models\Deal;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Services\admin\DealService as ObjService;


class DealController extends Controller
{
    public function __construct(protected ObjService $Objservice)
    {

    }


    public function index()
    {
        return $this->Objservice->index();
    }


    public function create()
    {
        //
    }


    public function store(DealRequest $request)
    {

    }


    public function show(Deal $deal)
    {
        //
    }


    public function edit(Deal $deal)
    {
        //
    }


    public function update(DealRequest $request)
    {

        return $this->Objservice->update($request->all());
    }



    public function destroy(Deal $deal)
    {
        //
    }
}
