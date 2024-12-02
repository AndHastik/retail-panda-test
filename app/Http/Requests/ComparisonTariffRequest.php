<?php

namespace App\Http\Requests;

use App\Exceptions\InvalidConsumptionException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class ComparisonTariffRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'consumption' => 'required|integer'
        ];
    }
    /**
     * @inheritdoc
     */
    public function messages(): array
    {
        return [
            'consumption.required' => 'A consumption is required',
            'consumption.integer' => 'A consumption must be type of int',
        ];
    }
    /**
     * @inheritdoc
     */
    protected function failedValidation(Validator $validator): void
    {
        throw new InvalidConsumptionException(response()->json([
            'status' => 'error',
            'message' => 'Validation Error',
            'errors' => $validator->errors(),
        ], Response::HTTP_UNPROCESSABLE_ENTITY));
    }
}
