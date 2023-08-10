<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CardRequest extends FormRequest
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
          'title' => 'required|array',    
          'title.*' => 'required|string',
          'content' => 'required|array',    
          'content.*' => 'required|string',
          'icon' => 'required|string',
          'card_type' => 'required|string'
        ];
    }
}
