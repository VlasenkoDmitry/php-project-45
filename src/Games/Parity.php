<?php

namespace BrainGames\Games\Parity;

use function BrainGames\OneWayComm\greetAndGetUserName;
use function BrainGames\OneWayComm\showResultAndBye;
use function BrainGames\Engine\play;

function gameParity()
{
    $name = greetAndGetUserName();
    $description = 'Answer "yes" if the number is even, otherwise answer "no"';
    $game = "parity";
    $result = play($description, $game);
    showResultAndBye($name, $result);
}
