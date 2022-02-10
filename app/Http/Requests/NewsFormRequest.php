<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsFormRequest extends FormRequest
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
                'author' => ['required', 'string', 'min:2', 'max:50'],
                'phone' => ['required', 'string'],
                'mail' => ['required', 'string'],
                'description' => ['nullable', 'string']
            ];
    }
}
