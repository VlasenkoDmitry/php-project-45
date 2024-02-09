<?php

namespace BrainGames\Games\Gcd;

use function BrainGames\OneWayComm\greetAndGetUserName;
use function BrainGames\OneWayComm\showResultAndBye;
use function BrainGames\Engine\playAndGetResult;

function gameGcd()
{
    $name = greetAndGetUserName();
    $description = 'Find the greatest common divisor of given numbers.';

    $gameFunction = function () {
        [$expression, $rightAnswer] = gameFunction();
        return [$expression, $rightAnswer];
    };

    $result = playAndGetResult($description, $gameFunction);
    showResultAndBye($name, $result);
}

function gameFunction()
{
    $min = 1;
    $max = 100;
    $oneRandom = random_int($min, $max);
    $twoRandom = random_int($min, $max);
    $saveArray = [$oneRandom, $twoRandom];

    while (min($oneRandom, $twoRandom) > 0) {
        if ($oneRandom >= $twoRandom) {
            $oneRandom = $oneRandom % $twoRandom;
        } else {
            $twoRandom = $twoRandom % $oneRandom;
        }
    }
    $expression = "{$saveArray[0]} {$saveArray[1]}";
    $rightAnswer = max($oneRandom, $twoRandom);

    return [$expression,$rightAnswer];
}
