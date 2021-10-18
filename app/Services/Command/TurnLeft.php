<?php


namespace App\Services\Command;


use App\Services\Direction\Direction;
use App\Services\Interfaces\CommandInterface;
use App\Services\Plateau\Plateau;
use App\Services\Rover\Rover;
use App\Services\Rover\RoverSetup;

class TurnLeft implements CommandInterface
{

    /**
     * @param Rover $rover
     */
    public function run(Rover $rover)
    {
        $current_setup = $rover->getSetup();
        $current_x_position = $current_setup->getCoordinate()->getX();
        $current_y_position = $current_setup->getCoordinate()->getY();
        $current_orientation = $current_setup->getDirection()->getDirection();

        $rover->setSetup(new RoverSetup(new Plateau($current_x_position, $current_y_position),
            $this->rotateFrom($current_orientation)));
    }

    /**
     * @param $current
     * @return mixed
     */
    public function rotateFrom($current)
    {
        if ($current == Direction::NORTH) {
            return Direction::WEST;
        } elseif ($current == Direction::SOUTH) {
            return Direction::EAST;
        } elseif ($current == Direction::EAST) {
            return Direction::NORTH;
        } elseif ($current == Direction::WEST) {
            return Direction::SOUTH;
        }
    }
}
