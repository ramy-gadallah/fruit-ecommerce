<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DealRequest extends FormRequest
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
            'title' => 'required',
            'subtitle' => 'required',
            'description' => 'required',
            'image' => 'required|image',
            'discount' => 'required|numeric',
            'counter'   => 'required|date|after:today',
            'product_id' => 'required',
        ];
    }

    protected function update(): array
    {
        return [
            'title' => 'nullable',
            'subtitle' => 'nullable',
            'description' => 'nullable',
        'discount' => 'nullable|numeric',
            'counter'   => 'nullable',
            'product_id' => 'nullable',
        ];
    }

    public function messages()
    {
        return [
                'title.required' => 'يجب ادخال العنوان',
                'subtitle.required' => 'يجب ادخال العنوان الفرعي',
                'description.required' => 'يجب ادخال الوصف',
                'image.required' => 'يجب ادخال الصورة',
                'discount.required' => 'يجب ادخال الخصم',
                'product_id.required' => 'يجب ادخال المنتج',
                'counter.required' => 'يجب ادخال التاريخ',
                'counter.date' => 'يجب ادخال التاريخ',
                'counter.after'=> 'يجب ادخال التاريخ لا يقل من اليوم',
              ];
    }
}
