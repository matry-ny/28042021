<?php

$new = [
    1, 2, 4
];

$new[] = 5;
$new[] = 6;

array_push($new, 7);

$new[2] = 11;

unset($new[3]);

$new[3] = 22;

$old = array(1, 2, 3, 4, 5, 6, 7);

var_dump($new, $old);

$a1 = [
    'name' => 'Dmytro',
    'lastName' => 'Kotenko',
    'age' => 32,
    'skills' => [
        [
            'language' => 'PHP',
            'exp' => '10+',
        ],
        [
            'language' => 'JS',
            'exp' => '10+',
        ],
        [
            'language' => 'C#',
            'exp' => '3+',
        ],
        [
            'language' => 'Java',
            'exp' => '1+',
        ],
    ],
];

$a1['company'] = 'MGID';
$a1['skills'][] = [
    'language' => 'Python',
    'exp' => 0,
];
$a1['skills'][1]['language'] = 'JavaScript';

unset($a1['skills'][3]);

var_dump($a1['lastName'], $new[1], array_slice($old, 2, 3));
var_dump($a1);
//$js = $a1['skills'][1];
var_dump($a1['skills'][1]['language'], $a1['skills'][1]['exp']);

$big = [
    'one' => [
        'two' => [
            'three' => [
                'four' => [
                    'five' => [
                        'six',
                    ],
                ],
            ],
        ],
    ],
];
var_dump($big);

echo '<pre>';
print_r($big);
echo '</pre>';

$a2 = ['Dmytro', 'Kotenko', 32];
//$name = $a2[0];
//$lastName = $a2[1];
//$age = $a2[2];
//list($name, $lastName, $age) = $a2;
[$name, $lastName, $age] = $a2;

var_dump($name, $lastName, $age);

$a3 = compact('name', 'age');
var_dump($a3);

