<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\GeneralRequest;
use Illuminate\Validation\Rule;

class StoreCountryRequest extends GeneralRequest
{
    /**
     * Get the validation rules that apply to the request.
     * @return array<string, mixed>
     */
    public function rules()
    {
        $id = $this->country?->id;
        return [
            'image' => ['nullable', 'image' , 'mimes:jpeg,png,jpg', Rule::requiredIf($id == null)],
            'ar.*' => ['required', Rule::unique('country_translations', 'name')->ignore($id, 'country_id')],
            'en.*' => ['required', Rule::unique('country_translations', 'name')->ignore($id, 'country_id')],
            'zip_code' => ['required', Rule::unique('countries', 'zip_code')->ignore($id, 'id')],
            'digit_number' => ['required'],
        ];
    }
    
}
