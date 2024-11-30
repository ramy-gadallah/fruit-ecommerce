<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\NewLetterRequest;
use App\Models\NewLetter;
use App\Services\admin\NewLetterService as ObjService;
use Illuminate\Http\Request;

class NewLetterController extends Controller
{

    public function __construct(protected ObjService $objService){

    }

    public function index(Request $request)
    {
        return $this->objService->index($request);
    }


    public function create()
    {
        //
    }


    public function store(NewLetterRequest $request)
    {
        return $this->objService->store($request->all());
    }


    public function show(NewLetter $newLetter)
    {
        //
    }


    public function edit(NewLetter $newLetter)
    {
        //
    }


    public function update(Request $request, NewLetter $newLetter)
    {
        //
    }


    public function destroy($id)
    {
        return $this->objService->destroy($id);
    }
}
