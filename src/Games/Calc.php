<?php

namespace BrainGames\Games\Calc;

use function BrainGames\OneWayComm\greetAndGetUserName;
use function BrainGames\OneWayComm\showResultAndBye;
use function BrainGames\Engine\playAndGetResult;

function gameCalc()
{
    $name = greetAndGetUserName();
    $description = 'What is the result of the expression?';

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
    $max = 3;
    $one = random_int($min, $max);
    $two = random_int($min, $max);
    $operationArray = array("+","-","*");
    $rand = random_int(0, count($operationArray) - 1);
    $operation = $operationArray[$rand];
    $expression = "{$one} {$operation} {$two}";
    $rightAnswer = eval("return $expression;");
    return [$expression,$rightAnswer];
}
