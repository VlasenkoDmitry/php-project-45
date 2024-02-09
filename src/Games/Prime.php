<?php

namespace BrainGames\Games\Prime;

use function BrainGames\OneWayComm\greetAndGetUserName;
use function BrainGames\OneWayComm\showResultAndBye;
use function BrainGames\Engine\playAndGetResult;

function gamePrime()
{
    $name = greetAndGetUserName();
    $description = 'Answer "yes" if given number is prime. Otherwise answer "no".';
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
    $max = 100;
    $randomNumber = random_int($min, $max);
    $rightAnswer = "yes";

    if ($randomNumber <= 1) {
        $rightAnswer =  "no";
    }
    for ($i = 2; $i <= sqrt($randomNumber); $i++) {
        if ($randomNumber % $i == 0) {
            $rightAnswer =  "no";
        }
    }
    $expression = $randomNumber;
    return [$expression, $rightAnswer];
}
