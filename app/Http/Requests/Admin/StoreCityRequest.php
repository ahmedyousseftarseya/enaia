<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\GeneralRequest;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreCityRequest extends GeneralRequest
{
    /**
     * Get the validation rules that apply to the request.
     * @return array<string, mixed>
     */
    public function rules()
    {
        $id = $this->city?->id;
        return [
            'ar.*' => ['required', Rule::unique('city_translations', 'name')->ignore($id, 'city_id')],
            'en.*' => ['required', Rule::unique('city_translations', 'name')->ignore($id, 'city_id')],
            'shipping_cost' => ['required', 'numeric', 'min:0'],
            'country_id' => ['required'],
        ];
    }
    
}
