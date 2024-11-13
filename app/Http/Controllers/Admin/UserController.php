<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Services\UserService as ObjService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(protected ObjService $objService){

    }

    public function index(Request $request)
    {
        return $this->objService->index($request);
    }


    public function create()
    {
        return $this->objService->create();
    }


    public function store(UserRequest $request)
    {
        $data=$request->validated();
        return $this->objService->store($data);
    }


    public function show($id)
    {
        //
    }


    public function edit(User $user)
    {
        return $this->objService->edit($user);
    }


    public function update(UserRequest $request ,$id)
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
