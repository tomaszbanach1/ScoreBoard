<?php

namespace ScoreBoard\Entity;
class Game
{
    private string $homeTeamName;

    private string $awayTeamName;
    private int $homeTeamScore;
    private int $awayTeamScore;
    private int $id;

    /**
     * @param string $homeTeamName
     * @param string $awayTeamName
     * @param int $homeTeamScore
     * @param int $awayTeamScore
     */
    public function __construct(string $homeTeamName, string $awayTeamName, int $homeTeamScore = 0, int $awayTeamScore = 0)
    {
        $this->homeTeamName = $homeTeamName;
        $this->awayTeamName = $awayTeamName;
        $this->homeTeamScore = $homeTeamScore;
        $this->awayTeamScore = $awayTeamScore;
    }

    public function getHomeTeamName(): string
    {
        return $this->homeTeamName;
    }

    public function getAwayTeamName(): string
    {
        return $this->awayTeamName;
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

    public function getId(): int
    {
        return $this -> id;
    }

    public function setId(int $id): void
    {
        $this -> id = $id;
    }

}