<?php

namespace Tests\Unit;

use App\Http\Services\Tennis;
use Pest\Laravel;
use function Pest\Laravel\get;
use function Pest\Laravel\json;

test('it has a welcome page', function () {
    get('/')->assertStatus(200);
});

test('returns the correct score', function ($player1, $player2, $score) {

    $testScore = (new Tennis())->createScore($player1, $player2);

    expect($testScore)->toBe($score);
})->with([
    [0, 0, 'Love All'],
    [0, 4, 'Winner: Player 2'],
    [1, 0, 'Fifteen-Love'],
    [1, 1, 'Fifteen All'],
    [2, 0, 'Thirty-Love'],
    [2, 2, 'Thirty All'],
    [3, 0, 'Forty-Love'],
    [3, 3, 'Deuce'],
    [3, 4, 'Advantage: Player 2'],
    [4, 0, 'Winner: Player 1'],
    [4, 3, 'Advantage: Player 1'],
    [4, 4, 'Deuce'],
    [5, 5, 'Deuce'],
    [6, 8, 'Winner: Player 2'],
    [10, 8, 'Winner: Player 1'],
]);

test('the request hits the correct endpoint', function() {
    json('POST', '/scores', ['player1' => 2, 'player2' => 3])->assertStatus(302);
});
