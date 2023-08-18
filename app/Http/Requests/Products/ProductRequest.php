<?php

namespace App\Http\Requests\Products;

use App\Constants\Enum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductRequest extends FormRequest
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
            'description' => 'required|string',
            'master_image' => 'nullable|file',
            'status' => ['nullable',Rule::in([Enum::PUBLISHED, Enum::INACTIVE])],
            'collection_id' => ['required','numeric' , 'exists:collections,id'],
            'tags' => ['nullable'],
            'products_images' => 'nullable|array',
            'colors' => 'required|array',
            'prices' => 'nullable|array',
            'stokes' => 'nullable|array',
            'product_color_image' => 'nullable|array',
            'products_images.*' => 'required|string|max:255',
            'product_color_image.*' => 'nullable|file',
            'colors.*' => 'nullable|string|max:255',
            'prices.*' => 'nullable|numeric',
            'stokes.*' => 'nullable|numeric',
//

        ];
    }
    public function messages()
    {
        return [];
    }
}
