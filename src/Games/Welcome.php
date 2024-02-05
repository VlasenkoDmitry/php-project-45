<?php

namespace BrainGames\Games\Weclome;


use function cli\line;
use function cli\prompt;

function welcome(): string 
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    return $name;
}