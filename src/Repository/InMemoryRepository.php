<?php

namespace ScoreBoard\Repository;

use ScoreBoard\Entity\Game;

class InMemoryRepository implements RepositoryInterface
{
    public function createGame(Game $game): void
    {
        // TODO: Implement createGame() method.
    }

    public function deleteGame(Game $game): void
    {
        // TODO: Implement deleteGame() method.
    }

    /**
     * @return Game[]
     */
    public function getAllSortedByTotalScore(): array
    {
        // TODO: Implement getAllSortedByTotalScore() method.
    }

    public function saveGame(Game $game): void
    {
        // TODO: Implement saveGame() method.
    }

    public function getGame(string $homeTeamName, string $awayTeamName): Game
    {
        // TODO: Implement getGame() method.
    }
}