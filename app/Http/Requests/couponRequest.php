<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class couponRequest extends FormRequest
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
            'from' => 'required|date|after:today',
            'to' => 'required|date|after:from',
            'discount' => 'required|required|numeric',
            'count' => 'required|numeric',
        ];
    }

    protected function update(): array
    {
        return [
            'from' => 'nullable|date|after:today',
            'to' => 'nullable|date|after:from',
            'discount' => 'nullable|required|numeric',
            'count' => 'nullable|numeric',

        ];
    }

    public function messages()
    {
        return [
          'from.required' => 'يجب ادخال التاريخ',
          'from.after'=> 'يجب ادخال التاريخ لا يقل من اليوم',
          'to.required' => 'يجب ادخال التاريخ',
          'to.after' => 'يجب ادخال التاريخ لا يقل من اليوم',
          'discount.required' => 'يجب ادخال الخصم',
          'count.required' => 'يجب ادخال العدد',

        ];
    }
}
