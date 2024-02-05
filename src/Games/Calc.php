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
    $result = play($description, $game, 'culc');
    showResultAndBye($name, $result);
}




function calc(): array
{
    $lower = 0;
    $upper = 3;
    $rightAnswer = "";
    $one = random_int($lower, $upper);
    $two = random_int($lower, $upper);
    $operationArray = array("+","-","*");
    $rand = random_int(0, 2);
    $operation = $operationArray[$rand];
    $expression = "{$one} {$operation} {$two}";

    switch ($operation) {
        case '+':
            $rightAnswer = $one + $two;
            break;
        case '-':
            $rightAnswer = $one - $two;
            break;
        case '*':
            $rightAnswer = $one * $two;
            break;
    }
    return array($expression,$rightAnswer);
}