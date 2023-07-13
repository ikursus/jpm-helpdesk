<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AduanRequest extends FormRequest
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
            'title' => 'required|min:3|string', // Cara 1 menulis validation rules. tanda | mengasingkan rules
            'description' => ['required', 'min:3'], // Cara 2 menulis validation rules. guna kaedah array
            'category' => ['required', 'array'],
            'category.*' => ['in:aplikasi,operasi,keselamatan'],
            'lampiran' => ['sometimes']
        ];
    }
}
