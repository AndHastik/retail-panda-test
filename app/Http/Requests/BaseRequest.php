<?php

namespace App\Http\Requests;

use App\Exceptions\InvalidDataException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class BaseRequest extends FormRequest
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
     * @inheritdoc
     */
    protected function failedValidation(Validator $validator): void
    {
        throw new InvalidDataException(response()->json([
            'status' => 'error',
            'message' => 'Validation Error',
            'errors' => $validator->errors(),
        ], Response::HTTP_UNPROCESSABLE_ENTITY));
    }
}
