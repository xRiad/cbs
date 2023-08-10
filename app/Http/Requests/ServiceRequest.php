<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
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
            'name' => 'required|array',
            'name.*' => 'required|string',
            'title' => 'required|array',
            'title.*' => 'required|string',

            'question' => 'required|array',
            'question.*' => 'required|string',
            'content' => 'required|array',
            'content.*' => 'required|string',
            'service_icon' => 'required|string',
            'image' => 'sometimes|image|mimes:jpg,png,webp,svg,gif|max:2048',
        ];
    }
}
