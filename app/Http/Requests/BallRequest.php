<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BallRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required',
        ];
    }
}