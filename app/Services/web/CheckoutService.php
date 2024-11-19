<?php

namespace App\Services\web;
use App\Services\BaseService;
use App\Models\Cart as ObjModel;


class CheckoutService extends BaseService
{
    protected $folder='web.check_out';

    public function __construct(ObjModel $model)
    {
        parent::__construct($model);
    }

    public function index()
    {
        return view($this->folder.'.index');
    }
}
