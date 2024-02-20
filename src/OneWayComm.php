<?php

namespace BrainGames\OneWayComm;

use function cli\line;
use function cli\prompt;

function greetAndGetUserName(): string
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, {$name}");
    return $name;
}

function showResultAndBye(string $name, bool $result)
{
    if ($result) {
        line("Congratulations, {$name}!");
    } else {
        line("Let's try again, {$name}!");
    }
    exit();
}
