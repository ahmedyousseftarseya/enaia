<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreCityRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     * @return array<string, mixed>
     */
    public function rules()
    {
        $id = $this->city?->id;
        return [
            'ar.*' => ['required', Rule::unique('city_translations', 'name')->ignore($id)],
            'en.*' => ['required', Rule::unique('city_translations', 'name')->ignore($id)],
            'country_id' => ['required'],
        ];
    }
    
}
