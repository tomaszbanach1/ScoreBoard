<?php

namespace ScoreBoard;

use ScoreBoard\Entity\Game;
use ScoreBoard\Repository\RepositoryInterface;

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
        $game = new Game($homeTeam, $awayTeam);
        $this->repository->createGame($game);
        return $game;
    }

    public function getGame(string $homeTeam, string $awayTeam): ?Game
    {
        return $this->repository->getGame($homeTeam, $awayTeam);
    }

    public function updateScore(Game $game, int $homeTeamScore, int $awayTeamScore): Game
    {
        $game->setHomeTeamScore($homeTeamScore);
        $game->setAwayTeamScore($awayTeamScore);
        $this->repository->saveGame($game);

        return $game;
    }

    public function finishGame(Game $game): void
    {
        $this->repository->deleteGame($game);
    }

    public function getSummary(): array
    {
        return $this->repository->getAllSortedByTotalScore();
    }
}