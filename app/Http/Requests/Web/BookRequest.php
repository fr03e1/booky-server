<?php

namespace App\Http\Requests\Web;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string',
            'description' => 'required|string|max:3000',
            'price' => 'required|decimal:2',
            'count' => 'required|integer',
            'category_id' => 'required|numeric',
            'publisher_id' => 'required|numeric',
            'authors' =>'required|array',
            'year' => 'required|numeric',
            'binding' => 'required|string|max:100',
            'ISBN' => 'required|string',
            'preview_image' => 'required|image',
            'images' => 'nullable|array',
//            'sorting' => 'nullable|string',
        ];
    }
}
