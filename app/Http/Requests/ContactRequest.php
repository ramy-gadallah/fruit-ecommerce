<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
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
            'name' => 'required',
            'email' => 'required|email',
            'phone'=>'required|numeric',
            'subject' => 'nullable',
            'message' => 'required',

        ];
    }

    protected function update(): array
    {
        return [

        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'يجب ادخال الاسم',
            'email.required' => 'يجب ادخال البريد الالكتروني',
            'phone.required' => 'يجب ادخال رقم الجوال',
            'message.required' => 'يجب ادخال الرسالة',
        ];
    }
}
