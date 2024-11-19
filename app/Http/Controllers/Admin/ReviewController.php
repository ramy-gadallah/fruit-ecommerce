<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReviewRequest;
use App\Models\Review as ObjModel;
use App\Services\admin\ReviewService as ObjService;
use App\Services\BaseService;

use Illuminate\Http\Request;

class ReviewController extends Controller
{

    public function __construct(protected ObjService $objService)
    {
        //
    }

    public function index(Request $request)
    {
        return $this->objService->index($request);
    }


    public function create()
    {
        return $this->objService->create();
    }


    public function store(ReviewRequest $request)
    {
        $data=$request->validated();
        return $this->objService->store($data);
    }


    public function show(ObjModel $ObjModel)
    {
        //
    }


    public function edit(ObjModel $review)
    {
        return $this->objService->edit($review);
    }


    public function update(ReviewRequest $request,$id)
    {
        $data=$request->validated();
        return $this->objService->update($id,$data);
    }


    public function destroy( $id)
    {
        return $this->objService->destroy($id);
    }
}
