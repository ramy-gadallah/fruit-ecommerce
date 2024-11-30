<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\web\PartnerService as ObjService;

class PartnerController extends Controller
{
    public function __construct(protected ObjService $ObjService)
    {

    }

    public function index()
    {
        return $this->ObjService->index();
    }
}
