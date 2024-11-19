<?php

namespace App\Services\web;
use App\Services\BaseService;
use App\Models\Cart as ObjModel;


class SinglproductService extends BaseService
{
    protected $folder='web.shop';

    public function __construct(ObjModel $model)
    {
        parent::__construct($model);
    }

    public function index()
    {
        return view($this->folder.'.single_product');
    }
}
