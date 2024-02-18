<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreHeadNurseRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     * @return array<string, mixed>
     */
    public function rules()
    {
        $id = $this->head_nurse?->id;
        return [
            'image' => ['nullable', 'image' , 'mimes:jpeg,png,jpg'],
            'name' => ['required'],
            'phone' => ['required', Rule::unique('doctors', 'phone')->ignore($id)],
            'password' => ['nullable', 'string', 'min:6'],
        ];
    }
    
}
