<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreArtworkRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'upload_date' => 'required|date|string',
            'medium' => 'required|string|max:255',
            'dimensions' => 'required|string|max:255',
            'image_url' => 'required|string|max:255',
            'visibility' => 'required|string|in:public,private',
        ];
    }
}
