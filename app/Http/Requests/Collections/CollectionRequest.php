<?php

namespace App\Http\Requests\Collections;

use App\Constants\Enum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CollectionRequest extends FormRequest
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


        return [
            'name' => 'required|string|max:255',
            'brand_id' => 'required',
        ];
    }
    public function messages()
    {
        return [];
    }
}
