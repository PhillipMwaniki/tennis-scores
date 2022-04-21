<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GameRequest extends FormRequest
{
    public function rules()
    {
        return [
            'player1' => ['min:0', 'required', 'integer', 'numeric'],
            'player2' => ['min:0', 'required', 'integer', 'numeric'],
        ];
    }
}
