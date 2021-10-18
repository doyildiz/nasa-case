<?php


namespace App\Services\Direction;


class Direction
{
    const NORTH = "N";
    const WEST = "W";
    const EAST = "E";
    const SOUTH = "S";

    private $direction = "";

    public function getDirection()
    {
        return $this->direction;
    }

    /**
     * Direction constructor.
     * @param $direction
     */
    public function __construct($direction)
    {
        if (in_array($direction, [self::NORTH, self::WEST, self::EAST, self::SOUTH])) {
            $this->direction = $direction;
        } else {
            $this->direction = "N";//default direction
        }

    }

}
