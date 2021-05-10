<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveProductRequest extends FormRequest
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
            'id' => [
                $this->getMethod() === 'PATCH' ? 'nullable' : 'required',
            ],
            'category_id' => 'required|max:36',
            'name' => 'required|max:150',
            'description' => 'required',
            'image' => [
                $this->getMethod() === 'PATCH' ? 'nullable' : 'required',
                'image'
            ],
            'price' => 'required|numeric',
            'with_stock' => 'boolean'
        ];
    }
}
