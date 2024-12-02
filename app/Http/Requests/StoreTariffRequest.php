<?php

namespace App\Http\Requests;

class StoreTariffRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'type' => 'required|exists:tariff_types,id|integer'
        ];
    }
    /**
     * @inheritdoc
     */
    public function messages(): array
    {
        return [
            'name.required' => 'A name is required',
            'name.string' => 'A name needs to be string',
            'type.required' => 'A type is required',
            'type.exists' => 'Unsupported type'
        ];
    }
}
