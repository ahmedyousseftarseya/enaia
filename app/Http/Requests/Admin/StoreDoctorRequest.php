<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\GeneralRequest;
use Illuminate\Validation\Rule;

class StoreDoctorRequest extends GeneralRequest
{
    /**
     * Get the validation rules that apply to the request.
     * @return array<string, mixed>
     */
    public function rules()
    {
        $id = $this->doctor?->id;
        return [
            'specialization_id' => ['required'],
            'image' => ['nullable', 'image' , 'mimes:jpeg,png,jpg'],
            'ar.name' => ['required'],
            'en.name' => ['required'],
            'ar.about' => ['required'],
            'en.about' => ['required'],
            'ar.experience' => ['required'],
            'en.experience' => ['required'],
            'phone' => ['required', Rule::unique('doctors', 'phone')->ignore($id)],
            'email' => ['nullable', 'email', Rule::unique('doctors', 'email')->ignore($id)],
            'password' => ['nullable', 'string', 'min:6'],
            'nurses' => ['nullable', 'array'],
            'nurses.*' => ['integer', 'exists:nurses,id'],
        ];
    }
    
}
