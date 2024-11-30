<?php

namespace App\Services\web;

use App\Models\BreadCramb;
use App\Services\BaseService;
use App\Models\Team as ObjModel;
use App\Models\Team;

class TeamService extends BaseService
{
    protected $folder='web.team';

    public function __construct(ObjModel $model)
    {
        parent::__construct($model);
    }


    public function index()
    {
        $breadcrumb=BreadCramb::where('page','team')->where('status',1)->first();
        $teams=Team::get();
        return view($this->folder.'.index',compact('teams','breadcrumb'));
    }
}
