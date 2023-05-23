<?php

namespace App\Http\Requests;

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
            'description' => 'required|string',
            'preview_image' => 'required',
            'price' => 'required|numeric',
            'count' => 'required|numeric',
            'is_published' => 'nullable',
            'category_id' => 'nullable',
            'publisher_id' => 'nullable|numeric',
            'authors' =>'nullable|array',
            'sorting' => 'nullable|string',
        ];
    }
}
