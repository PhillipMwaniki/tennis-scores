<?php

namespace App\Http\Controllers;

use App\Http\Services\Tennis;
use Illuminate\Http\Request;

class ScoreController extends Controller
{
    public function score(Request $request)
    {
        $score = (new Tennis())
            ->createScore((int) $request->get('player1'), (int) $request->get('player2'));

        return redirect('/')->with(['score' => $score]);
    }
}
