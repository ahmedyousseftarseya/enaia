<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreRoleRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     * @return array<string, mixed>
     */
    public function rules()
    {
        $id = $this->role?->id;
        return [
            'name' => ['required',  Rule::unique('roles', 'name')->ignore($id)],
            'display_name' => ['required'],
            'description' => ['nullable'],
            'permissions' => ['required', 'array'],
        ];
    }
    
}
