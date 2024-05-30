<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'producer' => 'required|string|max:255',
            'year' => 'required|integer|min:1900|max:'.date('Y'),
            'genre' => 'required|exists:genres,id',
            'country' => 'required|string|max:255',
            'description' => 'required|string',
        ];
    }
}
