<?php

namespace App\Services\admin;

use App\Models\Product as ObjModel;
use App\Models\Product;
use Yajra\DataTables\DataTables;
use App\Services\BaseService;
use Illuminate\Support\Facades\Storage;

class ProductService extends BaseService
{
    protected string $folder = 'admin/product';
    protected string $route = 'product';

    public function __construct(ObjModel $model,protected CategoryService $categoryService,protected UnitService $unitService)
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
                ->editColumn('category_id', function ($obj) {
                    return $obj->category->name;
                })
                ->editColumn('unit_id', function ($obj) {
                    return $obj->unit->name;
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

        return view($this->folder . '/parts/create',[
            'categories'=> $this->categoryService->model->where('status',1)->get(),
            'units'=> $this->unitService->model->where('status',1)->get()
        ]);
    }

    public function store($data)
    {
        $data['image']=$data['image']->store('product', 'public');
        $this->createData($data);
        return response()->json(['status' => 200]);
    }

    public function edit($ObjModel)
    {

        return view($this->folder . '/parts/edit',[
            'categories'=> $this->categoryService->getAll(),
            'units'=> $this->unitService->getAll(),
            'ObjModel'=>$ObjModel
        ]);
    }


    public function update($id, $data)
    {
            // $product=$this->getById($id);
            $product=Product::find($id);

            if(isset($data['image']) && $data['image'] != null){
                $data['image']=$data['image']->store('product', 'public');

                if($product->image){
                    Storage::disk('public')->delete($product->image);
                }
            }

            $product->update($data);
        // $this->updateData($id, $data);
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
