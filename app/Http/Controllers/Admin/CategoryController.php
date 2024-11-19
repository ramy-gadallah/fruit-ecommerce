<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Services\admin\CategoryService as ObjService;

class CategoryController extends Controller
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


    public function store(CategoryRequest $request)
    {
        $data=$request->validated();
        return $this->ObjService->store($data);

    }


    public function show(Category $category)
    {
        //
    }


    public function edit(Category $category)
    {
        return $this->ObjService->edit($category);
    }


    public function update(CategoryRequest $request, $id)
    {
        $data=$request->validated();
        return $this->ObjService->update($id,$data);
    }


    public function destroy($id)
    {
        return $this->ObjService->destroy($id);
    }

    public function changeStatus(Request $request)
    {
        return $this->ObjService->changeStatus($request);
    }
}
