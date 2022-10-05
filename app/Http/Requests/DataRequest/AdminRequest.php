<?php

namespace App\Http\Requests\DataRequest;
use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'recipe' => ['required', 'string'],
            'ingredients' => ['required', 'string'],
            'directions' => ['required', 'string'],
        ];
    }
}
