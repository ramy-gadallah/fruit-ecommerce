<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\TeamRequest;
use App\Models\team;
use Illuminate\Http\Request;
use App\Services\admin\TeamService as ObjService;
class TeamController extends Controller
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


    public function store(TeamRequest $request)
    {
        $data=$request->validated();
        return $this->objService->store($data);
    }




    public function edit(Team $team)
    {
        return $this->objService->edit($team);
    }


    public function update(TeamRequest $request,$id)
    {
        $data=$request->all();
        return $this->objService->update($id,$data);
    }


    public function destroy($id)
    {

        return $this->objService->destroy($id);
    }
}
