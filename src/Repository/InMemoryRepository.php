<?php

namespace ScoreBoard\Repository;

use RuntimeException;
use ScoreBoard\Entity\Game;

class InMemoryRepository implements RepositoryInterface
{
    public const ALREADY_EXIST = "Game already started";
    /**
     * @var Game[]
     */
    private array $games;
    private int $iterator = 0;

    public function createGame(Game $game): void
    {
        $key = $this->getKey($game);
        if (isset($this->games[$key])) throw new RuntimeException(self::ALREADY_EXIST);
        $game->setId(++$this->iterator);
        $this->games[$key] = $game;
    }

    private function getKey(Game $game): string
    {
        return $this->getKeyFromTeamNames($game->getHomeTeamName(), $game->getAwayTeamName());
    }

    private function getKeyFromTeamNames(string $homeTeamName, string $awayTeamName): string
    {
        return "$homeTeamName-$awayTeamName";
    }

    public function deleteGame(Game $game): void
    {
        unset($this->games[$this->getKey($game)]);
    }

    /**
     * @return Game[]
     */
    public function getAllSortedByTotalScore(): array
    {
        $sortedGames = array_merge($this->games, []);
        usort($sortedGames, function ($a, $b) {
            return match ($a->getTotalScore() <=> $b->getTotalScore()) {
                -1 => 1,
                1 => -1,
                0 => $a->getId() < $b->getId(),
                default => 0,
            };
        });
        return $sortedGames;
    }

    public function saveGame(Game $game): void
    {
        $this->games[$this->getKey($game)] = $game;
    }

    public function getGame(string $homeTeamName, string $awayTeamName): ?Game
    {
        return $this->games[$this->getKeyFromTeamNames($homeTeamName, $awayTeamName)] ?? null;
    }
}