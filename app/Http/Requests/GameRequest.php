<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class GameRequest extends FormRequest
{
    public function rules()
    {
        $player1 = $this->player1;
        $player2 = $this->player2;

        return [
            'player1' => ['min:0', 'required', 'integer', 'numeric', Rule::prohibitedIf(abs($player1-$player2) > 2 && ($player1 > 4 || $player2 > 4))],
            'player2' => ['min:0', 'required', 'integer', 'numeric', Rule::prohibitedIf(abs($player1-$player2) > 2 && ($player1 > 4 || $player2 > 4))],
        ];
    }

    public function messages()
    {
        return [
                'player1.prohibited' => 'This isn\'t a possible tennis score',
                'player2.prohibited' => 'This isn\'t a possible tennis score',
        ];
    }
}
