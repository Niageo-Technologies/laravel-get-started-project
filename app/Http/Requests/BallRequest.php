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
            'ball_position' => 'required',
            // 'spin' => 'required',
            // 'from' => 'required',
            // 'to' => 'required',
            // 'stroke_type' => 'required',
            // 'spin_intensity' => 'required',
            // 'length' => 'required',
            // 'own_shot' => 'required',
            // 'hand' => 'required',
        ];
    }
}