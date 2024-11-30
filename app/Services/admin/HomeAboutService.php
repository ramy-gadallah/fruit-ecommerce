<?php

namespace App\Services\admin;

use App\Models\HomeAbout as ObjModel;
use Illuminate\Support\Facades\Storage;
use App\Services\BaseService;


class HomeAboutService extends BaseService
{
    public function __construct(ObjModel $model)
    {
        parent::__construct($model);
    }

    public function index()
    {
        $obj=$this->model->first();
        return view('admin.home_about.index', compact('obj'));
    } // index

    public function update($data)
    {

        $item = $this->model->first();
        if ($item) {
            if (isset($data['image'])) {

                 if($item->image){
            Storage::disk('public')->delete($item->image);
        }
                $data['image'] = $data['image']->store('home_about', 'public');
                $this->updateData($item->id, $data);
                return response()->json(['status' => 200]);

        }

        }
        else{
            $data['image'] = $data['image']->store('home_about', 'public');
            $this->createData($data);
            return response()->json(['status' => 200]);
        }

    }
}
