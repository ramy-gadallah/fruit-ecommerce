<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UnitRequest extends FormRequest
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
            'name' => 'required|unique:units,name',
        ];
    }

    protected function update(): array
    {
        return [
            'name' => 'nullable|unique:units,name,' . $this->unit,

        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'يجب ادخال الاسم',
            'name.unique' => 'هذا القسم موجود من قبل',
        ];
    }
}