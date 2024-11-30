<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\BlogRequest;
use App\Services\admin\BlogService as ObjService;
use App\Models\Blog;
use App\Services\admin\BlogService;
use Illuminate\Http\Request;

class BlogController extends Controller
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


    public function store(BlogRequest $request)
    {
        return $this->objService->store($request->all());
    }


    public function show(Blog $blog)
    {
        //
    }


    public function edit(Blog $blog)
    {
        return $this->objService->edit($blog);
    }


    public function update(BlogRequest $request,$id)
    {
        return $this->objService->update($id,$request->all());
    }



    public function destroy($id)
    {

        return $this->objService->destroy($id);
    }
}
