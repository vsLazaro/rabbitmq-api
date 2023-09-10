<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PublishMessage extends FormRequest
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
            "message" => "array|required"
        ];
    }

    public function messages(): array
    {
        return [
            "message.required" => "The message field must exists",
            "message.array" => "The message field must be a valid json"
        ];
    }
}
