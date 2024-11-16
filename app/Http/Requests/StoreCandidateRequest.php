<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCandidateRequest extends FormRequest
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
            "photo"  => ["sometimes"],
            "name" => ["required", "string", "max:255"],
            "bio" => ["required", "string", "max:255"],
            "vision"  => ["required", "string", "max:255"],
            "mission"  => ["required", "string", "max:255"],
            "classroom_id"  => ["required", "integer", "max:255"],
        ];
    }
}
