<?php

namespace App\Http\Requests\Api;

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
            'categories' => 'nullable|array',
            'authors' => 'nullable|array',
            'publishers' => 'nullable|array',
            'year' => 'nullable|integer',
            'price' => 'nullable|array',
        ];
    }
}
