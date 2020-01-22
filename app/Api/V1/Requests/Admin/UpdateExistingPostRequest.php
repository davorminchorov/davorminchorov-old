<?php

namespace App\Api\V1\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateExistingPostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'title' => 'required',
            'slug' => 'required',
            'body' => 'required',
            'excerpt' => 'required',
            'published_at' => 'required|date_format:Y-m-d H:i:s',
        ];
    }
}
