<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FiltrateRequest extends FormRequest
{
    public function authorize()
    {
            return true;

    }
    public function messages()
    {
        return [
            'pricemax.integer' => 'Макс. ціна повинна бути цілим числом',
            'pricemax.max' => 'Мін. ціна повинна бути більша за 1млрд.',
            'pricemin.integer' => 'Мін. ціна повинна бути цілим числом',
            'pricemin.min' => 'Мін. ціна повинна бути більшою за 0',
            'pricemin.max' => 'Мін. ціна повинна бути менша за 1млрд.',
            'query.max' => 'Перевищено максимальну к-ть символів.'
        ];
    }

    public function rules()
    {
        return [
            'query' => 'nullable|max:50',
            'pricemin' => 'integer|nullable|min:0|max:1000000000',
            'pricemax' => 'integer|nullable|max:100000000',
        ];
    }
}
