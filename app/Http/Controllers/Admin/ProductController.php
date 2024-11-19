<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Services\admin\ProductService as ObjService;


class ProductController extends Controller
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


    public function store(ProductRequest $request)
    {
        $data=$request->validated();
        return $this->objService->store($data);
    }





    public function edit(Product $product)
    {
        return $this->objService->edit($product);
    }


    public function update(ProductRequest $request, $id)
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
