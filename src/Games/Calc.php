<?php

namespace BrainGames\Games\Calc;

use function BrainGames\OneWayComm\greetAndGetUserName;
use function BrainGames\OneWayComm\showResultAndBye;
use function BrainGames\Engine\play;

function gameCalc()
{
    $name = greetAndGetUserName();
    $description = 'What is the result of the expression?';
    $game = "calc";
    $result = play($description, $game);
    showResultAndBye($name, $result);
}
