<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PersonRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'username' => ['unique:people,username', 'required', 'string', 'max:255'],
            'sex' => ['required'],
            'address'   => ['required', 'string', 'max:255'],
            'IsMarried' => ['required'],
            'birth_day' => ['required', 'date', 'before:today'],
            'phone' => ['required', 'phone'],
        ];
    }
}
