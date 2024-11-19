<?php

namespace App\Services\web;
use App\Services\BaseService;
use App\Models\Cart as ObjModel;


class MainService extends BaseService
{

    public function __construct(ObjModel $model)
    {
        parent::__construct($model);
    }

    public function index()
    {
        return redirect()->route('admin.login');
    }
}
