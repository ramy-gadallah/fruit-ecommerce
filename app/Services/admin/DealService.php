<?php

namespace App\Services\admin;

use App\Models\Deal as ObjModel;
use App\Services\BaseService;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class DealService extends BaseService
{
    public $folder = 'admin.deal';

    public function __construct(ObjModel $model, protected ProductService $productService)
    {
        parent::__construct($model);
    }

    public function index()
    {
        $products = $this->productService->model->get();
        $deals = $this->model->first();
        return view($this->folder . '/index', [
            'products' => $products,
            'deals' => $deals
        ]);
    }

    public function create()
    {

        return view($this->folder . '/parts/create');
    }

    public function update($data)
    {

        // return $data;


        $recored = $this->model->first();


        if ($recored) {
            if (isset($data['image'])) {
                if ($recored->image) {
                    Storage::disk('public')->delete($recored->image);
                }
                $data['image'] = $data['image']->store('deal', 'public');

                if($this->updateData($recored->id, $data))

                return response()->json(['status' => 200]);
            }
            ;

        } else {
            $data['image'] = $data['image']->store('deal', 'public');
            $this->createData($data);
            return response()->json(['status' => 200]);
        }
    }
}
