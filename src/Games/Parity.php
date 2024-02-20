<?php

namespace BrainGames\Games\Parity;

use function BrainGames\OneWayComm\greetAndGetUserName;
use function BrainGames\OneWayComm\showResultAndBye;
use function BrainGames\Engine\playAndGetResult;

function gameParity()
{
    $name = greetAndGetUserName();
    $description = 'Answer "yes" if the number is even, otherwise answer "no".';

    $gameFunction = function () {
        [$expression, $rightAnswer] = gameFunction();
        return [$expression, $rightAnswer];
    };

    $result = playAndGetResult($description, $gameFunction);
    showResultAndBye($name, $result);
}

function gameFunction()
{
    $min = 0;
    $max = 999;
    $expression = random_int($min, $max);
    $rightAnswer = $expression % 2 === 0 ? 'yes' : "no";
    return array($expression,$rightAnswer);
}
