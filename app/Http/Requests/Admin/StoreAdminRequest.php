<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreAdminRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     * @return array<string, mixed>
     */
    public function rules()
    {
        $id = $this->admin?->id;
        return [
            'image' => ['nullable', 'image' , 'mimes:jpeg,png,jpg'],
            'username' => ['required'],
            'email' => ['required', 'email', Rule::unique('doctors', 'email')->ignore($id)],
            'phone' => ['required', Rule::unique('doctors', 'phone')->ignore($id)],
            'password' => ['nullable', 'string', 'min:6', 'confirmed', Rule::requiredIf($id == null)],
            'password_confirmation' => ['nullable', 'string', 'min:6', Rule::requiredIf($id == null)],
            'role' => ['required', 'exists:roles,id'],
        ];
    }
    
}
