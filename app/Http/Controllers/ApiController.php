<?php

namespace App\Http\Controllers;

use App\Services\Plateau\Plateau;
use App\Services\Rover\Rover;
use App\Services\Rover\RoverSetup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{

    public $command;
    public $rover;

    public function __construct()
    {
        $this->command = new \App\Services\Command\Command();
        $this->rover = new Rover();
    }


    public function move(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'command' => 'required | string',
            'x' => 'required | numeric | min:0',
            'y' => 'required | numeric | min:0',
            'direction' => 'required | string',
        ]);

        if ($validator->fails()) {
            return response()->json(json_encode($validator->errors()->getMessages()));
        }

        $command = $request->get('command');
        $plateau = new Plateau($request->get('x'), $request->get('y'));
        $this->rover->setSetup(new RoverSetup($plateau, $request->get('direction')));

        try {
            $this->rover->setCommands($this->command->parseCommand($command));
        } catch (\Exception $e) {
            Log::error($e->getMessage());
        }
        $this->rover->execute($this->rover);

        return response()->json([
            'status' => true,
            'data' => [
                'Current X' => $this->rover->getSetup()->getCoordinate()->getX(),
                'Current Y' => $this->rover->getSetup()->getCoordinate()->getY(),
                'Direction' => $this->rover->getSetup()->getDirection()->getDirection()
            ]
        ]);

    }
}
