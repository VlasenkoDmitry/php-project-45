<?php

namespace BrainGames\Games\Parity;

use function BrainGames\Cli\welcome;
use function cli\line;
use function cli\prompt;

function gameParity()
{
    $name = welcome();
    line('Answer "yes" if the number is even, otherwise answer "no"');
    $inGame = true;
    $counterRightAnswers = 0;
    
    while ($inGame && $counterRightAnswers < 3) {
        $randomNumber = random_int(0, 999);
        line("Question: {$randomNumber}");
        $answer = prompt("Your answer");
        $rightAnswer = checkParity($randomNumber);

        if ($rightAnswer === $answer) {
            line("Correct!");
            $counterRightAnswers += 1;
        } else {
            line("'{$answer}' is wrong answer ;(. Correct answer was '{$rightAnswer}'.");
            $inGame = false;
        }
    }

    if ($inGame) {
        line("Congratulations, {$name}!");
    } else {
        line("Let's try again, {$name}!");
    }
    exit();
}

function checkParity($number): string
{
    return $number % 2 === 0 ? 'yes' : "no";
}