<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\GeneralRequest;
use Illuminate\Validation\Rule;

class StoreHeadNurseRequest extends GeneralRequest
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
            'address' => ['nullable', Rule::unique('head_nurses', 'address')->ignore($id)],
            'password' => ['nullable', 'string', 'min:6'],
        ];
    }
    
}
