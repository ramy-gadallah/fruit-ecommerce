<?php

namespace App\Services\admin;

use App\Models\Slider as ObjModel;
use App\Models\Slider;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;
use App\Services\BaseService;


class SliderService extends BaseService
{
    protected string $folder = 'admin/slider';
    protected string $route = 'slider';

    public function __construct(ObjModel $model)
    {
        parent::__construct($model);
    }

    public function index($request)
    {
        $ObjModel=$this->model->first();
            return view($this->folder . '/index',[
                'ObjModel'=>$ObjModel
            ]);

    }


    public function edit($ObjModel)
    {
        return view($this->folder . '/parts/edit');
    }

    public function update($data)
    {
        $slider=$this->model->first();

        if($slider){
            if(isset($data['image'])){
                if($slider->image){
                    Storage::disk('public')->delete($slider->image);
                }
                $data['image'] = $data['image']->store('slider', 'public');
                $this->updateData($slider->id, $data);
                return response()->json(['status' => 200]);
            }
        }
        else{
            $data['image'] = $data['image']->store('slider', 'public');
            $this->createData($data);
            return response()->json(['status' => 200]);
        }


    }

}
