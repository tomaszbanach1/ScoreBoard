<?php

namespace ScoreBoard\Tests;

use PHPUnit\Framework\MockObject\Generator\MockClass;
use PHPUnit\Framework\MockObject\MockObject;
use ScoreBoard\Entity\Game;
use ScoreBoard\Repository\RepositoryInterface;
use ScoreBoard\ScoreBoard;
use PHPUnit\Framework\TestCase;
use ScoreBoard\ScoreBoardInterface;

class ScoreBoardTest extends TestCase
{
    private ScoreBoardInterface $board;

    private RepositoryInterface|MockObject $repository;


    protected function setUp(): void
    {
        $this->repository = $this->createMock(RepositoryInterface::class);
        $this->board = new ScoreBoard($this->repository);
    }

    public function testGetGame_success()
    {
        $this->repository->method("getGame")->willReturn(new Game("any", "any"));
        $this->assertInstanceOf(Game::class, $this->board->getGame("any", "any"));
    }

    public function testGetGame_noExist()
    {
        $this->repository->method("getGame")->willReturn(null);
        $this->assertNull($this->board->getGame("any", "any"));
    }

    public function testUpdateScore()
    {
        $this->repository->method("getGame")->willReturn(new Game("any", "any"));
        $this->repository->expects($this->exactly(1))->method("saveGame");

        $game = $this->board->getGame("any", "any");
        $updatedGame = $this->board->updateScore($game, 2, 4);
        $this->assertEquals(2, $updatedGame->getHomeTeamScore());
        $this->assertEquals(4, $updatedGame->getAwayTeamScore());
    }

    public function testFinishGame()
    {
        $this->repository->method("getGame")->willReturn(new Game("any", "any"));
        $this->repository->expects($this->exactly(1))->method("deleteGame");

        $game = $this->board->getGame("any", "any");
        $this->board->finishGame($game, 2, 4);
    }

    public function testStartGame()
    {
        $this->repository->expects($this->exactly(1))->method("createGame");

        $this->board->startGame("team1", "team2");
    }

    public function testGetSummary()
    {
        $this->repository
            ->expects($this->exactly(1))
            ->method("getAllSortedByTotalScore")
            ->willReturn(
                [
                    new Game("team1", "team2"),
                    new Game("team3", "team4"),
                    new Game("team5", "team6")
                ]
            );

        $this->board->getSummary();
    }
}
