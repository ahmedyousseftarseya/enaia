<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreAccountantRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     * @return array<string, mixed>
     */
    public function rules()
    {
        $id = $this->accountant?->id;
        return [
            'image' => ['nullable', 'image' , 'mimes:jpeg,png,jpg'],
            'name' => ['required'],
            'username' => ['required', Rule::unique('accountants', 'username')->ignore($id)],
            'email' => ['nullable', 'email', Rule::unique('accountants', 'email')->ignore($id)],
            'phone' => ['nullable', Rule::unique('accountants', 'phone')->ignore($id)],
            'password' => ['nullable', 'string', 'min:6', 'confirmed', Rule::requiredIf($id == null)],
            'password_confirmation' => ['nullable', 'string', 'min:6', Rule::requiredIf($id == null)],
        ];
    }
    
}
