<?php


namespace App\Services\Command;


use App\Services\Direction\Direction;
use App\Services\Interfaces\CommandInterface;
use App\Services\Plateau\Plateau;
use App\Services\Rover\Rover;
use App\Services\Rover\RoverSetup;

class Move implements CommandInterface
{

    /**
     * @param Rover $Rover
     * return void
     * @param Plateau $plateau
     */
    public function run(Rover $Rover)
    {
        $current_setup = $Rover->getSetup();
        $current_x_position = $current_setup->getCoordinate()->getX();
        $current_y_position = $current_setup->getCoordinate()->getY();
        $current_orientation = $current_setup->getDirection()->getDirection();

        if ($current_orientation == Direction::NORTH) {
            $Rover->setSetup(new RoverSetup(new Plateau($current_x_position, $current_y_position + 1), $current_orientation));
        } elseif ($current_orientation == Direction::WEST) {
            $Rover->setSetup(new RoverSetup(new Plateau($current_x_position - 1, $current_y_position), $current_orientation));
        } elseif ($current_orientation == Direction::EAST) {
            $Rover->setSetup(new RoverSetup(new Plateau($current_x_position + 1, $current_y_position), $current_orientation));
        } elseif ($current_orientation == Direction::SOUTH) {
            $Rover->setSetup(new RoverSetup(new Plateau($current_x_position, $current_y_position - 1), $current_orientation));
        }

        return;
    }

    /**
     * @param $current
     * @return mixed
     */
    public function rotateFrom($current)
    {
        // TODO: Implement rotateFrom() method.
    }
}
