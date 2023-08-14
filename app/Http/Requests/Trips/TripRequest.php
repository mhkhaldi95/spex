<?php

namespace App\Http\Requests\Trips;

use App\Constants\Enum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class TripRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $id = $this->route('id');

        return [
            'owner' => ['required'],
            'customer_id' => [
                Rule::requiredIf(function () {
                    return $this->input('owner') === 'customer' && false;
                }),
            ],
            'place_id' => [
                Rule::requiredIf(function () {
                    return $this->input('owner') === 'place' && false;
                }),
            ],
            'captain_id' => ['required', 'numeric', 'exists:users,id'],
            'amount' => ['nullable', 'numeric', 'max:9999'],
            'from' => ['nullable', 'string', 'max:255'],
            'to' => ['nullable', 'string', 'max:255'],
//            'status' => [
//                Rule::requiredIf(function () use ($id){
//                    return isset($id);
//                }), Rule::in([Enum::PENDING, Enum::COMPLETED, Enum::CANCELED])],
            'status' => [Rule::in([Enum::PENDING, Enum::COMPLETED, Enum::CANCELED])],
        ];
    }

    public function messages()
    {
        return [
            'customer_id.required' => 'الزبون مطلوب',
            'place_id.required' => 'المكان مطلوب',
            'captain_id.required' => ' الكابتن مطلوب',
            'status.required' => ' الحالة مطلوب',
        ];
    }
}
