<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\JobRequest;
use App\Models\Job;
use Illuminate\Http\Request;
use App\Services\admin\JobService as ObjService;

class JobController extends Controller
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


    public function store(JobRequest $request)
    {
        $data=$request->validated();
        return $this->objService->store($data);

    }


    public function show()
    {

    }


    public function edit(Job $job)
    {
        return $this->objService->edit($job);
    }


    public function update(JobRequest $request, $id)
    {
        $data=$request->validated();
        return $this->objService->update($id,$data);
    }


    public function destroy($id)
    {
        return $this->objService->destroy($id);
    }

    public function changeStatus(Request $request){
        return $this->objService->changeStatus($request);
    }
}
