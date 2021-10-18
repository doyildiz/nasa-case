<?php


namespace App\Services\Rover;

use App\Services\Command\Command;

class Rover extends \ArrayObject
{

    private $setup;

    /**
     * @return mixed
     */
    public function getSetup()
    {
        return $this->setup;
    }

    /**
     * @var Command
     */
    private $commands;

    /**
     * @param array $commands
     * return void
     */
    public function setCommands($commands)
    {
        $this->commands = $commands;
    }

    /**
     * @param RoverSetup $rover_setup
     */
    public function setSetup(RoverSetup $rover_setup)
    {
        $this->setup = $rover_setup;
    }

    /**
     * @param Rover $rover
     * @return void
     */
    public function execute(Rover $rover)
    {
        foreach ($this->commands as $command) {
            $command->run($rover);
        }
    }


}
