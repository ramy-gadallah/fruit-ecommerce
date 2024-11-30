<?php

namespace App\Services\admin;

use App\Enums\RoleEnum;
use App\Models\Job;
use App\Models\Team as ObjModel;
use App\Models\Team;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;
use App\Services\BaseService;


class TeamService extends BaseService
{
    protected string $folder = 'admin/team';
    protected string $route = 'team';

    public function __construct(ObjModel $model,protected JobService $jobService)
    {
        parent::__construct($model);
    }

    public function index($request)
    {
        if ($request->ajax()) {
            $obj = $this->getDataTable();
            return DataTables::of($obj)
                ->addColumn('action', function ($obj) {
                    $buttons = '';

                        $buttons .= '
                            <button type="button" data-id="' . $obj->id . '" class="btn btn-pill btn-info-light editBtn">
                            <i class="fa fa-edit"></i>
                            </button>
                       ';
                        $buttons .= '<button class="btn btn-pill btn-danger-light" data-bs-toggle="modal"
                        data-bs-target="#delete_modal" data-id="' . $obj->id . '" data-title="' . $obj->name . '">
                        <i class="fas fa-trash"></i>
                        </button>';
                    return $buttons;
                })->editColumn('image', function ($obj) {
                    if ($obj)
                    return '<img src="'. asset('storage/'.$obj->image) .'" onclick="window.open('."'". asset('storage/'.$obj->image) ."'".')" style="cursor:pointer;" width="100" height="100" class="avatar avatar-md rounded-circle">';
                else
                    $image = asset('assets/uploads/empty.png');
                    return '<img src="'. asset($image) .'" onclick="window.open('."'". asset($image) ."'".')" style="cursor:pointer;" width="100" height="100">';

                })->editColumn('status', function ($obj) {
                    return '
                    <div class="form-check form-switch">
                       <input style="margin-left: 0px;" class="tgl tgl-ios statusBtn form-check-input" data-id="' . $obj->id . '" name="statusBtn" id="statusUser-' . $obj->id . '" type="checkbox" ' . ($obj->status == 1 ? 'checked' : '') . '/>
                       <label class="tgl-btn" dir="ltr" for="statusUser-' . $obj->id . '"></label>
                    </div>';
                })

                ->addIndexColumn()
                ->escapeColumns([])
                ->make(true);
        } else {
            return view($this->folder . '/index');
        }
    }

    public function create()
    {
        $jobService=$this->jobService->model->get();
        return view($this->folder . '/parts/create',
        [
            'jobs'=>$jobService

        ]
    );
    }

    public function store($data)
    {
        $data['image'] = $data['image']->store('team', 'public');
        $this->createData($data);
        return response()->json(['status' => 200]);
    }

    public function edit($ObjModel)
    {
        $jobs=Job::get();
        return view($this->folder . '/parts/edit',compact('ObjModel','jobs'));
    }

    public function update($id, $data)
    {
        $team=Team::find($id);
        if(isset($data['image']) && $data['image'] != null){

            $data['image']=$data['image']->store('team', 'public');
            if($team->image){
                Storage::disk('public')->delete($team->image);
            }
        }



        $this->updateData($id, $data);
        return response()->json(['status' => 200]);
    }




    public function destroy($id)
    {
        $item=$this->getById($id);

        if($item->image){
            Storage::disk('public')->delete($item->image);
        }

        $this->delete($id);
        return response()->json(['status' => 200]);
    }
}
