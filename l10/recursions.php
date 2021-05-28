<?php

$data = [
    ['title' => 'TITLE', 'link' => '/link'],
    ['title' => 'PARENT 1', 'children' => [
        ['title' => 'CHILD', 'link' => '/child-link'],
        ['title' => 'CHILD', 'children' => [
            ['title' => 'CHILD7', 'link' => '/child-link7'],
            ['title' => 'CHILD8', 'children' => [
                ['title' => 'TITLE9', 'link' => '/link9'],
                ['title' => 'TITLE10', 'link' => '/link10'],
                ['title' => 'TITLE10', 'children' => [
                    ['title' => 'TITLE9', 'link' => '/link9'],
                    ['title' => 'TITLE10', 'link' => '/link10'],
                ]],
            ]],
        ]],
        ['title' => 'CHILD2', 'link' => '/child-link2'],
    ]],
    ['title' => 'TITLE2', 'link' => '/link2'],
    ['title' => 'TITLE3', 'link' => '/link3'],
    ['title' => 'PARENT 2', 'children' => [
        ['title' => 'CHILD3', 'link' => '/child-link3'],
        ['title' => 'CHILD4', 'link' => '/child-link4'],
    ]],
    ['title' => 'PARENT 3', 'children' => [
        ['title' => 'CHILD5', 'link' => '/child-link5'],
        ['title' => 'CHILD6', 'link' => '/child-link6'],
    ]],
];

function getMenuHtml(array $data): string
{
    $html = '<ul>';
    foreach ($data as $row) {
        if (array_key_exists('children', $row)) {
            $html .= '<li>';
            $html .= $row['title'];
            $html .= getMenuHtml($row['children']);
            $html .= '</li>';
        } else {
            $html .= "<li><a href='{$row['link']}'>{$row['title']}</a></li>";
        }
    }
    $html .= '</ul>';

    return $html;
}

echo getMenuHtml($data);

//$pow = pow(3, 3);
//$pow = 3 ** 3;

function power(int $number, int $power): int
{
    var_dump($number, $power);
    if ($power === 1) {
        return $number;
    }

    if ($power === 0) {
        return $number === 0 ? 0 : 1;
    }

    $r = $number * power($number, $power - 1);
    var_dump("$number ^ $power = $r");
    return $r;
}
$pow = power(3, 5);
var_dump($pow);

$count = 0;

function fibonacci(int $n)
{
    global $count;
    $count++;

    static $storage = [];
    if (array_key_exists($n, $storage)) {
        return $storage[$n];
    }

    if ($n === 0 || $n === 1) {
        return $n;
    }

    $storage[$n] = fibonacci($n - 1) + fibonacci($n - 2);
    return $storage[$n];
}

$f = fibonacci(6);
var_dump($f, $count);

// 1 1 2 3 5 8 13 21
