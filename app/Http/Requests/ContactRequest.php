<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'adress' => 'required|string',
            'phone' => 'required|string',
            'mail' => 'required|string',
            'whatsapp' => 'required|string',
            'instagram' => 'required|string',
            'facebook' => 'required|string',
            'linkedin' => 'required|string',
            'twitter' => 'required|string'
        ];
    }
}
