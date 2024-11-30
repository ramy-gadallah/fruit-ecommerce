<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\web\TeamService as ObjService;

class TeamController extends Controller
{
    public function __construct(protected ObjService $service)
    {

    }
    public function index()
    {
        return $this->service->index();}
}
