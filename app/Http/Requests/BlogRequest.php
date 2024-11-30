<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BlogRequest extends FormRequest
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
            'title' => 'required|unique:blogs,title',
            'description' => 'required',
            'image'=>'required|image',
            'date' => 'required|date',
        ];
    }

    protected function update(): array
    {
        return [
            'title' => 'nullable|unique:blogs,title,' . $this->blog,
            'description' => 'nullable',
            'image'=>'nullable|image',
            'created_by' => 'nullable',
            'date' => 'nullable|date',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'يجب ادخال العنوان',
            'title.unique' => 'هذا العنوان موجود من قبل',
            'description.required' => 'يجب ادخال الوصف',
            'image.required' => 'يجب ادخال الصورة',
            'created_by.required' => 'يجب ادخال المنشئ',
            'date.required' => 'يجب ادخال التاريخ',
        ];
    }
}
