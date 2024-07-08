<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\GeneralRequest;
use App\Models\Coupon;
use Illuminate\Validation\Rule;

class StoreCouponRequest extends GeneralRequest
{
    /**
     * Get the validation rules that apply to the request.
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'type' => ['required', Rule::in(Coupon::TYPE)],
            'value' => ['required', 'numeric'],
            'from' => ['required', 'date'],
            'to' => ['required', 'date'],
            'status' => ['nullable'],
        ];
    }
    
}
