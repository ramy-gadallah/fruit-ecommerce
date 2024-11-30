<?php

namespace App\Services\web;
use App\Services\BaseService;
use App\Models\Blog as ObjModel;
use App\Models\BreadCramb;

class NewService extends BaseService
{
    protected $folder='web.news';

    public function __construct(ObjModel $model)
    {
        parent::__construct($model);
    }


    public function index()
    {
        $blogs=$this->model->get();
        $breadcrumb=BreadCramb::where('page','news')->where('status',1)->first();

        return view($this->folder.'.index',compact('blogs','breadcrumb'));
    }
}
