<?php


namespace App\Services\Command;




class Command extends \ArrayObject
{

    const MOVE = "M";
    const TURN_RIGHT = "R";
    const TURN_LEFT = "L";
    /**
     * @param $commands_input
     * @return array
     * @throws \Exception
     */
    public function parseCommand($commands_input)
    {
        $arr = [];
        $commands = str_split(trim($commands_input));
        foreach ($commands as $command_type) {
            $arr[] = $this->commandName($command_type);
        }

        return $arr;
    }

    /**
     * @param string $command_type
     * @return Move|TurnLeft|TurnRight
     * @throws \Exception
     */
    public function commandName($command_type)
    {
        switch ($command_type) {
            case self::MOVE:
                return new Move();
            case self::TURN_RIGHT:
                return new TurnRight();
            case self::TURN_LEFT:
                return new TurnLeft();
            default:
                throw new \Exception("ERROR: Invalid command type");
        }
    }

}
