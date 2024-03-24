<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\GeneralRequest;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreAdminRequest extends GeneralRequest
{
    /**
     * Get the validation rules that apply to the request.
     * @return array<string, mixed>
     */
    public function rules()
    {
        $id = $this->admins?->id;
        return [
            'image' => ['nullable', 'image' , 'mimes:jpeg,png,jpg'],
            'username' => ['required', Rule::unique('admins', 'username')->ignore($id)],
            'email' => ['required', 'email', Rule::unique('admins', 'email')->ignore($id)],
            'phone' => ['required', Rule::unique('admins', 'phone')->ignore($id)],
            'password' => ['nullable', 'string', 'min:6', 'confirmed', Rule::requiredIf($id == null)],
            'password_confirmation' => ['nullable', 'string', 'min:6', Rule::requiredIf($id == null)],
            'role' => ['required', 'exists:roles,id'],
        ];
    }
    
}
    