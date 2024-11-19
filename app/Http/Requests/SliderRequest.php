<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SliderRequest extends FormRequest
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
           'image' => 'required|image',
           'title' => 'required|string',
           'description' => 'required|string',
        ];
    }

    protected function update(): array
    {
        return [
            'image' => 'nullable|image',
            'title' => 'nullable|string',
            'description' => 'nullable|string',
        ];
    }

    public function messages()
    {
        return [
                'image.required' => 'يجب ادخال الرابط',
                'image.image' => 'يجب ادخال رابط صحيح',
                'title.required' => 'يجب ادخال العنوان',
                'title.required' => 'يجب ادخال العنوان الفرعي',
                'description.required' => 'يجب ادخال الوصف',

                ];
    }
}
