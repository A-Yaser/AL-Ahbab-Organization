<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreTesterRequest extends PersonRequest
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
        // dd($this);
        return [
            'email' => ['unique:users,email', 'required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:5'],
            'institute_id' => ['exists:institutes,id'],
        ];
    }
}
