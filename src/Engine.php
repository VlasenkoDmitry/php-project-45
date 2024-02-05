<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

function play($description, $game): bool
{

    line($description);

    $inGame = true;
    $maxRounds = 3;
    $numberRound = 0;
    while ($inGame && $numberRound < $maxRounds) {
        $arrayParamQuestion = array();
        switch ($game) {
            case 'calc':
                $arrayParamQuestion = getExpressionAndAnswer();
                break;
            case 'parity':
                $arrayParamQuestion = getrandomNumberAndParity();
                break;
            default:
                $arrayParamQuestion = ["1+1", 2];
                break;
        }
        $paramQuestion = $arrayParamQuestion[0];
        $rightAnswer = $arrayParamQuestion[1];

        line("Question: {$paramQuestion}");
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



function getExpressionAndAnswer(): array
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


function getrandomNumberAndParity(): array
{
    $expression = random_int(0, 999);
    $rightAnswer = checkParity($expression);
    return array($expression,$rightAnswer);
}

function checkParity($number): string
{
    return $number % 2 === 0 ? 'yes' : "no";
}


/*
2 игры

общий алгоритм

приветствие и взять имя
показать правила                        \
Начать цикл максимум 3 раза
    получить вопрос                     \
    показать вопрос
    получить ответ пользователя
    получить верный ответ
    сравнить ответ с верным ответом
    отреагировать




разное

*/
