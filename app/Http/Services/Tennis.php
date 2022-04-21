<?php

namespace App\Http\Services;

class Tennis
{
    protected int $player1;
    protected int $player2;

    public function createScore(int $player1, int $player2): string
    {
        $this->player1 = $player1;
        $this->player2 = $player2;

        if ($this->hasWinner()) {
            return 'Winner: '. $this->winner();
        }

        if ($this->hasAdvantage()) {
            return 'Advantage: '. $this->winner();
        }

        // check for players tie 3 n above scores
        if ($this->playersTied()) {
            return 'Deuce';
        }

        // check for players tie below 3 scores
        if (($this->player1 < 3 && $this->player2 < 3) && ($this->player1 === $this->player2)) {
            return $this->processScore($this->player1) . ' All';
        }

        return sprintf(
            '%s-%s',
            $this->processScore($this->player1),
            $this->processScore($this->player2),
        );
    }

    private function hasWinner(): bool
    {
        if ($this->player1 < 4 && $this->player2 < 4) {
            return false;
        }

        return abs($this->player1 - $this->player2) >=2;
    }

    private function processScore(int $playerScore): string
    {
        return match ($playerScore) {
            0 => 'Love',
            1 => '15',
            2 => '30',
            3 => '40',
        };
    }

    private function playersTied(): bool
    {
        if ($this->player1 >=3 && $this->player2 >= 3) {
            return $this->player1 === $this->player2;
        }

        return false;
    }

    private function winner(): string
    {
        if ($this->player1 > $this->player2){
            return 'Player 1';
        }
        return 'Player 2';
    }

    private function hasAdvantage(): bool
    {
        if ($this->player1 >=3 && $this->player2 >= 3) {
            return $this->player1 !== $this->player2;
        }

        return false;
    }

}
