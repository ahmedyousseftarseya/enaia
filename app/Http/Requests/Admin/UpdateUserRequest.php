<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\GeneralRequest;
use App\Models\User;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends GeneralRequest
{
    /**
     * Get the validation rules that apply to the request.
     * @return array<string, mixed>
     */
    public function rules()
    {
        $id = $this->user?->id;
        return [
            'image' => ['nullable', 'image' , 'mimes:jpeg,png,jpg'],
            'national_id' => ['required', Rule::unique('users', 'national_id')->ignore($id)],
            'name' => ['required'],
            'date_of_birth' => ['required', 'date'],
            'phone' => ['required', Rule::unique('users', 'phone')->ignore($id)],
            'email' => ['required', 'email', Rule::unique('users', 'email')->ignore($id)],
            'password' => ['nullable', 'string', 'min:6', 'confirmed', Rule::requiredIf($id == null)],
            'password_confirmation' => ['nullable', 'string', 'min:6', Rule::requiredIf($id == null)],
            'gender' => ['required', Rule::in(User::GENDER)],
            'nationality' => ['required'],
            'blood_group' => ['required'],
            'address' => ['required'],
            'status' => ['required', Rule::in(User::STATUS)],
            'lat' => ['nullable'],
            'lng' => ['nullable'],
        ];
    }
    
}
