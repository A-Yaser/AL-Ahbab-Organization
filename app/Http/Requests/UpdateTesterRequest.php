<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateTesterRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', Rule::unique('people', 'username')->ignore($this->person_id)],
            'birth_day' => ['required', 'date'],
            'phone' => ['required', 'string', 'max:255'],
            'sex' => ['required'],
            'address'   => ['required', 'string', 'max:255'],
            'IsMarried' => ['required'],

            'institute_id' => 'nullable',
            // 'institute_id' => ['exists:institutes,id'],
        ];
    }
}
