<?php

namespace BrainGames\Games\Progression;

use function BrainGames\OneWayComm\greetAndGetUserName;
use function BrainGames\OneWayComm\showResultAndBye;
use function BrainGames\Engine\play;

function gameProgression()
{
    $name = greetAndGetUserName();
    $description = 'What number is missing in the progression?';

    $gameFunction = function () {
        $numberInProgr = random_int(5, 10);
        $start = random_int(1, 50);
        $end = random_int(100, 200);
        $maxStep = (int)(($end - $start) / $numberInProgr);
        $step = random_int(1, $maxStep);

        $progressionArray = [];
        for ($i = $start; $i <= $end; $i += $step) {
            $progressionArray[] = $i;
        }

        $indexStartViewProgr = random_int(0, (count($progressionArray)) - $numberInProgr);
        $viewProgressionArray = array_slice($progressionArray, $indexStartViewProgr, $numberInProgr);
        $indexHiddenNumber = random_int(0, $numberInProgr - 1);
        $rightAnswer = $viewProgressionArray[$indexHiddenNumber];
        $viewProgressionArray[$indexHiddenNumber] = "..";
        $expression = implode(" ", $viewProgressionArray);
        return array($expression, $rightAnswer);
    };

    $result = play($description, $gameFunction);
    showResultAndBye($name, $result);
}
