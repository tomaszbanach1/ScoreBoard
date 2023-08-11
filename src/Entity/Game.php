<?php

namespace ScoreBoard\Entity;
class Game
{
    private string $homeTeamName;

    private string $awayTeamName;
    private int $homeTeamScore;
    private int $awayTeamScore;

    /**
     * @param string $homeTeamName
     * @param string $awayTeamName
     */
    public function __construct(string $homeTeamName, string $awayTeamName, int $homeTeamScore = 0, int $awayTeamScore = 0)
    {
    }


    public function getHomeTeamName(): string
    {
        return $this->homeTeamName;
    }

    public function setHomeTeamName(string $homeTeamName): void
    {
        $this->homeTeamName = $homeTeamName;
    }

    public function getAwayTeamName(): string
    {
        return $this->awayTeamName;
    }

    public function setAwayTeamName(string $awayTeamName): void
    {
        $this->awayTeamName = $awayTeamName;
    }

    public function getHomeTeamScore(): int
    {
        return $this->homeTeamScore;
    }

    public function setHomeTeamScore(int $homeTeamScore): void
    {
        $this->homeTeamScore = $homeTeamScore;
    }

    public function getAwayTeamScore(): int
    {
        return $this->awayTeamScore;
    }

    public function setAwayTeamScore(int $awayTeamScore): void
    {
        $this->awayTeamScore = $awayTeamScore;
    }

    public function getTotalScore(): int
    {
        return $this->awayTeamScore + $this->homeTeamScore;
    }
}