<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class NewLetterRequest extends FormRequest
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
            'email' => 'required|unique:new_letters,email',
        ];
    }

    protected function update(): array
    {
        return [
            'email' => 'nullable|unique:categories,email,' . $this->category,

        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'يجب ادخال الاسم',
            'email.unique' => 'هذا الايميل موجود من قبل',
        ];
    }
}
