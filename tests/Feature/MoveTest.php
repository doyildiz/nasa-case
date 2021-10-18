<?php

namespace Tests\Feature;

use App\Services\Plateau\Plateau;
use App\Services\Rover\Rover;
use App\Services\Rover\RoverSetup;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MoveTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_moves()
    {
        $response = $this->get('/move?x=0&y=0&direction=N&command=LMLMLMLMM');

        $response->assertStatus(200);
    }

    public function test_moves_correct()
    {
        $move = 'M';
        $command = new \App\Services\Command\Command();
        $rover = new Rover();
        $plateau = new Plateau(0, 0);
        $rover->setSetup(new RoverSetup($plateau, 'N'));
        $rover->setCommands($command->parseCommand($move));
        $rover->execute($rover);

        $this->assertEquals(0, $rover->getSetup()->getCoordinate()->getX());

        $this->assertEquals(1, $rover->getSetup()->getCoordinate()->getY());

        $this->assertEquals('N', $rover->getSetup()->getDirection()->getDirection());

    }

    public function test_left_correct()
    {
        $move = 'L';
        $command = new \App\Services\Command\Command();
        $rover = new Rover();
        $plateau = new Plateau(0, 0);
        $rover->setSetup(new RoverSetup($plateau, 'N'));
        $rover->setCommands($command->parseCommand($move));
        $rover->execute($rover);

        $this->assertEquals(0, $rover->getSetup()->getCoordinate()->getX());

        $this->assertEquals(0, $rover->getSetup()->getCoordinate()->getY());

        $this->assertEquals('W', $rover->getSetup()->getDirection()->getDirection());
    }

    public function test_right_correct()
    {
        $move = 'R';
        $command = new \App\Services\Command\Command();
        $rover = new Rover();
        $plateau = new Plateau(0, 0);
        $rover->setSetup(new RoverSetup($plateau, 'N'));
        $rover->setCommands($command->parseCommand($move));
        $rover->execute($rover);

        $this->assertEquals(0, $rover->getSetup()->getCoordinate()->getX());

        $this->assertEquals(0, $rover->getSetup()->getCoordinate()->getY());

        $this->assertEquals('E', $rover->getSetup()->getDirection()->getDirection());
    }
}
