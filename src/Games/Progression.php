<?php

namespace BrainGames\Games\Progression;

use function BrainGames\OneWayComm\greetAndGetUserName;
use function BrainGames\OneWayComm\showResultAndBye;
use function BrainGames\Engine\playAndGetResult;

function gameProgression()
{
    $name = greetAndGetUserName();
    $description = 'What number is missing in the progression?';

    $gameFunction = function () {
        [$expression, $rightAnswer] = gameFunction();
        return [$expression, $rightAnswer];
    };

    $result = playAndGetResult($description, $gameFunction);
    showResultAndBye($name, $result);
}

function gameFunction()
{
    $mincountInProgresss = 5;
    $maxcountInProgresss = 10;
    $minRandomNumberInProgressStart = -20;
    $maxRandomNumberInProgressStart = 50;
    $minRandomNumberInProgressEnd = 100;
    $maxRandomNumberInProgressEnd = 200;

    $countInProgress = random_int($mincountInProgresss, $maxcountInProgresss);
    $start = random_int($minRandomNumberInProgressStart, $maxRandomNumberInProgressStart);
    $end = random_int($minRandomNumberInProgressEnd, $maxRandomNumberInProgressEnd);
    $maxStep = (int)(($end - $start) / $countInProgress);
    $step = random_int(1, $maxStep);

    $progressionArray = [];
    for ($i = $start; $i <= $end; $i += $step) {
        $progressionArray[] = $i;
    }

    $indexStartViewProgr = random_int(0, (count($progressionArray)) - $countInProgress);
    $viewProgressionArray = array_slice($progressionArray, $indexStartViewProgr, $countInProgress);
    $indexHiddenNumber = random_int(0, $countInProgress - 1);
    $rightAnswer = $viewProgressionArray[$indexHiddenNumber];
    $viewProgressionArray[$indexHiddenNumber] = "..";
    $expression = implode(" ", $viewProgressionArray);
    return array($expression, $rightAnswer);
}
