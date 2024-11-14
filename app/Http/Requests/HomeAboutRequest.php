<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class HomeAboutRequest extends FormRequest
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
           'link' => 'required|url',
           'image' => 'required|image',
           'title' => 'required|string',
           'subtitle' => 'required|string',
           'description' => 'required|string',
        ];
    }

    protected function update(): array
    {
        return [
            'link' => 'nullable|url',
            'title' => 'nullable|string',
            'subtitle' => 'nullable|string',
            'description' => 'nullable|string',
        ];
    }

    public function messages()
    {
        return [
                'link.required' => 'يجب ادخال الرابط',
                'link.link' => 'يجب ادخال رابط صحيح',
                'image.required' => 'يجب ادخال الصورة',
                'image.image' => 'يجب ادخال صورة صحيحة',
                'title.required' => 'يجب ادخال العنوان',
                'subtitle.required' => 'يجب ادخال العنوان الفرعي',
                'description.required' => 'يجب ادخال الوصف',

                ];
    }
}
