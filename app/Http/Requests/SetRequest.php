<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SetRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'opponent_id' => 'required',
            'bh_rubber' => 'required',
            'fh_rubber' => 'required',
        ];
    }
}