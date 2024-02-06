<?php

namespace BrainGames\Games\Gcd;

use function BrainGames\OneWayComm\greetAndGetUserName;
use function BrainGames\OneWayComm\showResultAndBye;
use function BrainGames\Engine\play;

function gameGcd()
{
    $name = greetAndGetUserName();
    $description = 'Find the greatest common divisor of given numbers.';

    $gameFunction = function () {
        $lower = 1;
        $upper = 100;
        $oneRandom = random_int($lower, $upper);
        $twoRandom = random_int($lower, $upper);
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
    };

    $result = play($description, $gameFunction);
    showResultAndBye($name, $result);
}
