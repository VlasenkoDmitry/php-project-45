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
    $progressionStart = rand(1, 100);
    $progressionMultiplicator = rand(-10, 10);
    $emptyPosition = rand(0, 9);
    $progressionList = [$progressionStart];
    foreach (range(1, 9) as $i) {
        $progressionList[$i] = $progressionList[$i - 1] + $progressionMultiplicator;
    }
    $correctAnswer = (string) $progressionList[$emptyPosition];
    $progressionList[$emptyPosition] = "..";
    $question = implode(' ', $progressionList);
    return [$question, $correctAnswer];
}
