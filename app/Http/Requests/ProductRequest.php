<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductRequest extends FormRequest
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
            'name' => 'required|unique:Products,name',
            'description' => 'nullable',
            'image' => 'required|image',
            'category_id' => 'required',
            'unit_id' => 'required',
            'price' => 'required',
            'quantity' => 'required',
        ];
    }

    protected function update(): array
    {
        return [
            'name' => 'nullable|unique:Products,name,' . $this->product,
            'description' => 'nullable',
            'image' => 'nullable|image',
            'category_id' => 'nullable',
            'unit_id' => 'nullable',
            'price' => 'nullable',
            'quantity' => 'nullable',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'يجب ادخال الاسم',
            'name.unique' => 'هذا المنتج موجود من قبل',
            'image.required' => 'يجب ادخال الصورة',
            'image.image' => 'يجب ادخال صورة صحيحة',
            'category_id.required' => 'يجب ادخال القسم',
            'unit_id.required' => 'يجب ادخال الوحدة',
            'price.required' => 'يجب ادخال السعر',
            'quantity.required' => 'يجب ادخال الكمية',

        ];
    }
}
