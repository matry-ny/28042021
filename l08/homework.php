<?php

$data = [
    ['title' => 'TITLE', 'link' => '/link'],
    ['title' => 'TITLE2', 'link' => '/link2'],
    ['title' => 'PARENT 1', 'children' => [
        ['title' => 'CHILD', 'link' => '/child-link'],
        ['title' => 'CHILD2', 'link' => '/child-link2'],
    ]],
];
/*
 * Your PHP - code here
 */
$html = <<<HTML
<ul>
    <li><a href="/link">TITLE</a></li>
    <li><a href="/link2">TITLE2</a></li>
    <li>
        PARENT 1
        <ul>
            <li><a href="/child-link">CHILD</a></li>
            <li><a href="/child-link2">CHILD2</a></li>    
        </ul>
    </li>
</ul>
HTML;
