<?php


namespace App\Services\Rover;


use App\Services\Coordinate\Coordinate;
use App\Services\Direction\Direction;
use App\Services\Plateau\Plateau;

class RoverSetup
{
    /**
     * @var Coordinate
     */
    private $Coordinate;

    /**
     * @return Coordinate
     */
    public function getCoordinate()
    {
        return $this->Coordinate;
    }

    /**
     * @var Direction
     */
    private $Direction;

    /**
     * @return Direction
     */
    public function getDirection()
    {
        return $this->Direction;
    }

    /**
     * RoverSetup constructor.
     * @param Plateau $plateau
     * @param $direction
     */
    public function __construct(Plateau $plateau, $direction)
    {
        $this->Coordinate = new Coordinate($plateau->getPlateau()->getX(), $plateau->getPlateau()->getY());
        $this->Direction = new Direction($direction);
    }

}
