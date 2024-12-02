<?php

namespace App\Http\Requests;

class StoreTariffTypeRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'id' => 'required|unique:tariff_types,id|integer',
            'name' => 'required|string'
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
            'id.required' => 'Type Id is required',
            'id.unique' => 'Type Id must be unique'
        ];
    }
}
