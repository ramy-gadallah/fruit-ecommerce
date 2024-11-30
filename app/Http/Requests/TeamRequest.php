<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TeamRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        if (request()->isMethod('put')) {
            return $this->update();
        } else {
            return $this->store();
        }
    }

    protected function store(): array
    {
        return [
            'name' => 'required|unique:units,name',
            'job_id' => 'required',
            'image' => 'required|image',
            'facebook' => 'nullable|url',
            'twitter' => 'nullable|url',
            'instagram' => 'nullable|url',
        ];
    }

    protected function update(): array
    {
        return [
            'name' => 'required|unique:teams,name,' . $this->id,
            'job_id' => 'required',
            'image' => 'nullable|image',
            'facebook' => 'required|url',
            'twitter' => 'required|url',
            'instagram' => 'required|url',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'يجب ادخال الاسم',
            'name.unique' => 'هذا الموظف موجود من قبل',
            'image.required' => 'يجب ادخال الصورة',
            'image.image' => 'يجب ادخال صورة صحيحة',

        ];
    }
}
