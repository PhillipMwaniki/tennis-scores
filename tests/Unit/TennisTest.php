<?php

use App\Http\Services\Tennis;

test('returns the correct score', function ($player1, $player2, $score) {

    $testScore = (new Tennis())->createScore($player1, $player2);

    expect($testScore)->toBe($score);
})->with([
    [0, 0, 'Love All'],
    [1, 0, 'Fifteen-Love'],
    [1, 1, 'Fifteen All'],
    [2, 0, 'Thirty-Love'],
    [3, 0, 'Forty-Love'],
    [2, 2, 'Thirty All'],
    [3, 3, 'Deuce'],
    [4, 4, 'Deuce'],
    [5, 5, 'Deuce'],
    [4, 3, 'Advantage: Player 1'],
    [3, 4, 'Advantage: Player 2'],
    [4, 0, 'Winner: Player 1'],
    [0, 4, 'Winner: Player 2'],
]);
