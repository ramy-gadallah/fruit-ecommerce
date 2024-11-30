<?php

namespace App\Services\web;

use App\Models\BreadCramb;
use App\Services\BaseService;
use App\Models\Contact as ObjModel;


class ContactService extends BaseService
{
    protected $folder='web.contact';

    public function __construct(ObjModel $model)
    {
        parent::__construct($model);
    }

    public function index()
    {
        $breadcrumb=BreadCramb::where('page','contact')->where('status',1)->first();
        return view($this->folder.'.index',[
            'breadcrumb'=>$breadcrumb
        ]);
    }
    public function store($request)
    {
        $this->createData($request);
         return response()->json([
            'status' => 200,
            'message' => 'Created Successfully',
            'redirect'=>route('web.contact.index')
        ]);


    }
}
