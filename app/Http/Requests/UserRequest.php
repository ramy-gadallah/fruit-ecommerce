<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
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
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
            'address'=>'required',
            'phone'=>'unique:users,phone',
            'point'=>'nullable',
            'device_token'=>'nullable',
            'image'=>'required',
        ];
    }

    protected function update(): array
    {
        return [
            'name' => 'nullable',
            'email' => 'nullable|email|unique:users,email,' . $this->user,
            'password' => 'nullable|min:6|confirmed',
            'address'=>'nullable',
            'phone'=>'nullable',
            'point'=>'nullable',
            'device_token'=>'nullable',
            'image'=>'nullable',
        ];
    }

    public function messages()
    {
        return [
                'name.required' => 'يجب ادخال الاسم',
                'email.required' => 'يجب ادخال البريد الالكتروني',
                'password.required_without' => 'يجب ادخال كلمة المرور',
                'password.min' => 'الحد الادني لكلمة المرور : 6 احرف',
                'password.confirmed' => 'كلمة المرور غير متطابقة',
                'email.unique' => 'البريد الالكتروني مستخدم من قبل',
                'address.required' => 'يجب ادخال العنوان',
                'phone.unique' => 'رقم الجوال مستخدم من قبل',
                'phone.required' => 'يجب ادخال رقم الجوال',
                'image.required' => 'يجب ادخال الصورة'
                ,];
    }
}
