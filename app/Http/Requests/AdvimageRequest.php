<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class AdvimageRequest extends FormRequest
{

    public function authorize()
    {
        if (Auth::check()) {
            return true;
        }
        return false;
    }

    public function messages()
    {
        return [
            'image.image'=>'Фотографії для події повинні бути картинками!',
            'image.required' =>'Щоб додати фото, необхідно його завантажити.',
        ];
    }

    public function rules()
    {
        return [
            'image' => 'required|image',
        ];
    }
}
