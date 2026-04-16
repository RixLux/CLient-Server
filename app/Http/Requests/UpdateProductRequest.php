<?php

namespace App\Http\Requests;

class UpdateProductRequest extends StoreProductRequest
{
    public function rules(): array
    {
        $rules = parent::rules();

        $rules['name'] = 'sometimes|string|min:3|max:255|unique:products,name';
        $rules['price'] = 'sometimes|numeric|min:1000|max:100000000';

        return $rules;
    }
}
