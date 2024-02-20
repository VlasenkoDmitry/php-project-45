<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

function playAndGetResult(string $description, callable $gameFunction): bool
{
    $inGame = true;
    $maxRounds = 3;
    $numberRound = 0;

    line($description);
    while ($inGame && $numberRound < $maxRounds) {
        [$expression,$rightAnswer] = $gameFunction();
        line("Question: {$expression}");
        $answer = prompt("Your answer");
        if ($rightAnswer == $answer) {
            line("Correct!");
            $numberRound += 1;
        } else {
            line("'{$answer}' is wrong answer ;(. Correct answer was '{$rightAnswer}'.");
            $inGame = false;
        }
    }
    return $inGame;
}
