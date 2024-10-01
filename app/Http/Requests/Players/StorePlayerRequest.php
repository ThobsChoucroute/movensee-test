<?php

namespace App\Http\Requests\Players;

use App\Enums\Role;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class StorePlayerRequest extends FormRequest
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
            "lastname" => "required|string|max:50",
            "firstname" => "required|string|max:50",
            "birth_date" => "required|date",
            "arrived_at" => "required|date",
            "strong_foot" => "required|string",
            "role" => ["required", Rule::enum(Role::class)],
        ];
    }

    public function failedValidation(Validator $validator): void
    {
        throw new HttpResponseException(response()->json([
            "message" => "Something went wrong...",
            "data" => $validator->errors(),
        ], 422));
    }
}
