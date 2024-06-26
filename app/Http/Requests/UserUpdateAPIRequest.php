<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Traits\ValidatesAndPreparesRequestData;
use Illuminate\Contracts\Validation\ValidationRule;

class UserUpdateAPIRequest extends FormRequest
{
    use ValidatesAndPreparesRequestData;

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Gets the fields for which data will be prepared for validation.
     *
     * @return array
     */
    protected function prepareForValidationFields(): array
    {
        return ['userId'];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'userId' => 'required|exists:users,id',
            'name' => 'required|string|max:255',           
            'email' => 'required|string|max:255',
            'password' => 'nullable|string|max:255'
        ];
    }
}
