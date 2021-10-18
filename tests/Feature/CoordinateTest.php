<?php

namespace Tests\Feature;

use App\Services\Coordinate\Coordinate;
use App\Services\Plateau\Plateau;
use App\Services\Rover\Rover;
use App\Services\Rover\RoverSetup;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CoordinateTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_x_direction()
    {
        $coordinate = new Coordinate("2", "3");
        $this->assertSame(2, $coordinate->getX());
    }

    public function test_y_direction()
    {
        $coordinate = new Coordinate("2", "3");
        $this->assertSame(3, $coordinate->getY());
    }


    public function test_rover_direction()
    {
        $plateau = new Plateau(0, 0);
        $rover = new Rover();
        $rover->setSetup(new RoverSetup($plateau, 'W'));

        $this->assertSame('W', $rover->getSetup()->getDirection()->getDirection());

    }
}
