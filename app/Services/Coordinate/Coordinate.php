<?php


namespace App\Services\Coordinate;


class Coordinate
{
    /**
     * @var int
     */
    private $x;

    /**
     * @var int
     */
    private $y;

    /**
     * @return int
     */
    public function getX()
    {
        return $this->x;
    }


    /**
     * @return int
     */
    public function getY()
    {
        return $this->y;
    }

    /**
     * @param $x
     * @param $y
     */
    public function __construct($x, $y)
    {
        $this->x = (int)$x;
        $this->y = (int)$y;
    }
}
