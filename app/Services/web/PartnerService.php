<?php

namespace App\Services\web;

use App\Models\Partner;
use App\Services\BaseService;
use App\Models\partner as ObjModel;
use App\Models\Team;

class PartnerService extends BaseService
{

    public function __construct(ObjModel $model)
    {
        parent::__construct($model);
    }


    public function index()
    {
        $partners=Partner::get();
        return view('web.layouts.footer',compact('partners'));
    }
}
