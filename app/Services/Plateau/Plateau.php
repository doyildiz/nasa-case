<?php


namespace App\Services\Plateau;

use App\Services\Coordinate\Coordinate;

class Plateau
{

    private $plateau;

    public function __construct($x, $y)
    {
        $this->plateau = new Coordinate($x, $y);
    }

    /**
     * @return mixed
     */
    public function getPlateau()
    {
        return $this->plateau;
    }

}
