<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'is_admin' => ['required', 'boolean']
        ];
    }

    public function messages(): array
    {
        return [
            'required' => 'Нужно заполнить поле :attribute'
        ];
    }
    public function attributes(): array
    {
        return [
            'is_admin' => 'права доступа'
        ];
    }
}
