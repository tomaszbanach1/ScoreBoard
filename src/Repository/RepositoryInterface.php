<?php

namespace ScoreBoard\Repository;

use ScoreBoard\Entity\Game;

interface RepositoryInterface
{
    public function getAllSortedByTotalScore(): array;

    public function saveGame(Game $game): void;

    public function createGame(Game $game): void;

    public function getGame(string $homeTeamName, string $awayTeamName): ?Game;

    public function deleteGame(Game $game): void;
}