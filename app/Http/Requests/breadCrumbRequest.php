<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class breadCrumbRequest extends FormRequest
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

           'page' => 'required|string',
           'image' => 'required|image',
        ];
    }

    protected function update(): array
    {
        return [
            'page' => 'nullable',
            'image' => 'nullable',
        ];
    }

    public function messages()
    {
        return [
               'name.required' => 'يجب ادخال الاسم',
               'image.required' => 'يجب ادخال الصورة',
                ];
    }
}
