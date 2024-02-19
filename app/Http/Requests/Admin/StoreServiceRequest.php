<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreServiceRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     * @return array<string, mixed>
     */
    public function rules()
    {
        $id = $this->service?->id;
        return [
            'image' => ['nullable', 'image' , 'mimes:jpeg,png,jpg'],
            'ar.title' => ['required',  Rule::unique('service_translations', 'title')->ignore($id, 'service_id')], 
            'en.title' => ['required',  Rule::unique('service_translations', 'title')->ignore($id, 'service_id')], 
            'ar.description' => ['nullable'], 
            'en.description' => ['nullable'], 
        ];
    }
    
}
