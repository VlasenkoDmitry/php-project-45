<?php

namespace BrainGames\Games\Parity;

use function BrainGames\OneWayComm\greetAndGetUserName;
use function BrainGames\OneWayComm\showResultAndBye;
use function BrainGames\Engine\play;

function gameParity()
{
    $name = greetAndGetUserName();
    $description = 'Answer "yes" if the number is even, otherwise answer "no"';

    $gameFunction = function () {
        $expression = random_int(0, 999);
        $rightAnswer = $expression % 2 === 0 ? 'yes' : "no";
        return array($expression,$rightAnswer);
    };

    $result = play($description, $gameFunction);
    showResultAndBye($name, $result);
}
