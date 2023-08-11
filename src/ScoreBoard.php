<?php

namespace ScoreBoard;

use ScoreBoard\Entity\Game;
use ScoreBoard\Repository\RepositoryInterface;
use ScoreBoard\ScoreBoardInterface;

class ScoreBoard implements ScoreBoardInterface
{

    private RepositoryInterface $repository;

    /**
     * @param RepositoryInterface $repository
     */
    public function __construct(RepositoryInterface $repository)
    {
        $this->repository = $repository;
    }


    public function startGame(string $homeTeam, string $awayTeam): Game
    {
        // TODO: Implement startGame() method.
    }

    public function getGame(string $homeTeam, string $awayTeam): ?Game
    {
        // TODO: Implement getGame() method.
    }

    public function updateScore(Game $game, int $homeTeamScore, int $awayTeamScore): Game
    {
        // TODO: Implement updateScore() method.
    }

    public function finishGame()
    {
        // TODO: Implement finishGame() method.
    }

    public function getSummary()
    {
        // TODO: Implement getSummary() method.
    }
}