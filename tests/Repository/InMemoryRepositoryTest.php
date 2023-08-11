<?php

namespace ScoreBoard\Tests\Repository;

use \RuntimeException;
use ScoreBoard\Entity\Game;
use ScoreBoard\Repository\InMemoryRepository;
use PHPUnit\Framework\TestCase;

class InMemoryRepositoryTest extends TestCase
{
    private InMemoryRepository $repository;

    protected function setUp(): void
    {
        $this->repository = new InMemoryRepository();
    }

    public function testCreateGame_throwExceptionWhenExist()
    {
        $this->expectException(RuntimeException::class);
        $this->repository->createGame(new Game("a", "b"));
        $this->repository->createGame(new Game("a", "b"));
    }

    public function testSaveGame_works()
    {
        $game = new Game("a", "b");
        $this->repository->createGame($game);
        $game->setAwayTeamScore(3);
        $game->setHomeTeamScore(5);
        $this->repository->saveGame($game);
        $getGame = $this->repository->getGame("a", "b");
        $this->assertEquals($game, $getGame);
    }

    public function testGetAllSortedByTotalScore_returnArrayOfCreatedRecords()
    {
        $this->repository->createGame(new Game("Mexico", "Canada", 0, 5));
        $this->repository->createGame(new Game("Spain", "Brazil:", 10, 2));
        $this->repository->createGame(new Game("Germany", "France", 2, 2));
        $this->repository->createGame(new Game("Uruguay", "Italy", 6, 6));
        $this->repository->createGame(new Game("Argentina", "Australia", 3, 1));

        $results = $this->repository->getAllSortedByTotalScore();

        $this->assertEquals("Uruguay", $results[0]->getHomeTeamName());
        $this->assertEquals("Spain", $results[1]->getHomeTeamName());
        $this->assertEquals("Mexico", $results[2]->getHomeTeamName());
        $this->assertEquals("Argentina", $results[3]->getHomeTeamName());
        $this->assertEquals("Germany", $results[4]->getHomeTeamName());
    }

    public function testDeleteGame()
    {

    }

}
