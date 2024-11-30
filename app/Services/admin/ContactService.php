<?php

namespace App\Services\admin;

use App\Enums\RoleEnum;
use App\Models\Contact as ObjModel;
use Yajra\DataTables\DataTables;
use App\Services\BaseService;

class ContactService extends BaseService
{
    protected string $folder = 'admin/contact';

    public function __construct(ObjModel $model)
    {
        parent::__construct($model);
    }

    public function index($request)
    {
        if ($request->ajax()) {
            $obj = $this->getDataTable();
            return DataTables::of($obj)
                // ->addColumn('action', function ($obj) {
                //     $buttons = '';
                //         $buttons .= '
                //             <button type="button" data-id="' . $obj->id . '" class="btn btn-pill btn-info-light editBtn">
                //             <i class="fa fa-edit"></i>
                //             </button>
                //        ';
                //         $buttons .= '<button class="btn btn-pill btn-danger-light" data-bs-toggle="modal"
                //         data-bs-target="#delete_modal" data-id="' . $obj->id . '" data-title="' . $obj->name . '">
                //         <i class="fas fa-trash"></i>
                //         </button>';
                //     return $buttons;
                // })                ->addIndexColumn()
                ->escapeColumns([])
                ->make(true);
        } else {
            return view($this->folder . '/index');
        }
    }




    public function create()
    {

        return view($this->folder . '/parts/create');
    }

    public function store($data)
    {
        $this->createData($data);
        return response()->json(['status' => 200]);
    }

    public function edit($ObjModel)
    {

        // return $ObjModel;
        return view($this->folder . '/parts/edit',compact('ObjModel'));
    }

    public function update($id, $data)
    {



        $user = $this->getById($id);
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