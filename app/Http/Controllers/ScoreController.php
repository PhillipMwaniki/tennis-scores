<?php

namespace App\Http\Controllers;

use App\Http\Services\Tennis;
use App\Http\Requests\GameRequest;

class ScoreController extends Controller
{
    public function score(GameRequest $request)
    {
        $score = (new Tennis())
            ->createScore((int) $request->get('player1'), (int) $request->get('player2'));

        return redirect('/')->with(['score' => $score]);
    }
}
