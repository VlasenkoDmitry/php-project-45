<?php

namespace BrainGames\Games\Calc;

use function BrainGames\OneWayComm\greetAndGetUserName;
use function BrainGames\OneWayComm\showResultAndBye;
use function BrainGames\Engine\play;

function gameCalc()
{
    $name = greetAndGetUserName();
    $description = 'What is the result of the expression?';

    $gameFunction = function () {
        $lower = 0;
        $upper = 3;
        $one = random_int($lower, $upper);
        $two = random_int($lower, $upper);
        $operationArray = array("+","-","*");
        $rand = random_int(0, count($operationArray) - 1);
        $operation = $operationArray[$rand];
        $expression = "{$one}{$operation}{$two}";
        $rightAnswer = eval("return $expression;");
        return [$expression,$rightAnswer];
    };

    $result = play($description, $gameFunction);
    showResultAndBye($name, $result);
}
