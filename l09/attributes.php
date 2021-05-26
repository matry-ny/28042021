<?php

declare(strict_types=1);

function hello(string $name, int $age, string $gender, string $greeting = 'Hello')
{
    echo "{$greeting}, {$gender} {$name}, {$age} years old<br>";
}

$users = [
    ['name' => 'Dmytro', 'age' => 32, 'gender' => 'male'],
    ['name' => 'Andrew', 'age' => 33, 'gender' => 'male'],
    ['name' => 'Ostap', 'age' => 34, 'gender' => 'male', 'greeting' => 'Hi'],
    ['name' => 'Ivan', 'age' => 35, 'gender' => 'male'],
    ['name' => 'Hanna', 'age' => 36, 'gender' => 'female', 'greeting' => 'Хаюшки'],
];

foreach ($users as $user) {
    if (array_key_exists('greeting', $user)) {
        hello($user['name'], $user['age'], $user['gender'], $user['greeting']);
    } else {
        hello($user['name'], $user['age'], $user['gender']);
    }
}

function test(string $p1 = 'data 1', string $p2 = 'data 2', string $p3 = 'data 3')
{
    echo "{$p1}_{$p2}_{$p3}<br>";
}

test('data 1', 'P2 Changed'); // before PHP8
test(p2:'P2 Changed'); // PHP8 and higher

function sum(string $message, int ...$numbers)
{
    echo $message, array_sum($numbers), '<br>';
}

sum('Tada!', 1, 3, 5, 6, 7, 12, 21);
