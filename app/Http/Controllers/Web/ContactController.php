<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Services\web\ContactService as ObjService;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function __construct(protected ObjService $objService){

    }
    public function index(){
        return $this->objService->index();
    }

    public function store(ContactRequest $request){

        return $this->objService->store($request->all());
    }
}
