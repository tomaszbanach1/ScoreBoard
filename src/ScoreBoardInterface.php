<?php

namespace ScoreBoard;

use RuntimeException;
use ScoreBoard\Entity\Game;

interface ScoreBoardInterface
{
    /**
     * @param string $homeTeam
     * @param string $awayTeam
     * @return Game
     * @throws RuntimeException
     */
    public function startGame(string $homeTeam, string $awayTeam): Game;

    public function getGame(string $homeTeam, string $awayTeam): ?Game;

    public function updateScore(Game $game, int $homeTeamScore, int $awayTeamScore): Game;

    public function finishGame();

    public function getSummary();
}