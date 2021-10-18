<?php


namespace App\Services\Interfaces;

use App\Services\Rover\Rover;

/**
 * Interface CommandInterface
 * @package App\Services\Interfaces
 */
interface CommandInterface
{
    /**
     * @param Rover $rover
     */
    public function run(Rover $rover);


    /**
     * @param $current
     * @return mixed
     */
    public function rotateFrom($current);
}
