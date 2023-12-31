<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
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
            'slug' => 'required|string',
            'category_id' => 'string|nullable',
            'image' => 'sometimes|image|mimes:jpg,png,webp,svg,gif|max:2048',
            'image_detail' => 'sometimes|image|mimes:jpg,png,webp,svg,gif|max:2048',
            'content' => 'required|array',
            'content.*' => 'required|string',
        ];
    }
}
