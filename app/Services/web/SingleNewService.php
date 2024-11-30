<?php

namespace App\Services\web;
use App\Services\BaseService;
use App\Models\Blog as ObjModel;
use App\Models\BreadCramb;

class SingleNewService extends BaseService
{
    protected $folder='web.news';

    public function __construct(ObjModel $model)
    {
        parent::__construct($model);
    }

    public function index($id)
    {
        $breadcrumb=BreadCramb::where('page','single_article')->where('status',1)->first();

        $obj=$this->model->find($id);
        return view($this->folder.'.single_new_index', compact('obj','breadcrumb'));
    }
}
