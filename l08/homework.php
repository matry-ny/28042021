<?php

$data = [
    ['title' => 'TITLE', 'link' => '/link'],
    ['title' => 'PARENT 1', 'children' => [
        ['title' => 'CHILD', 'link' => '/child-link'],
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

$html = '<ul>';
foreach ($data as $item) {
    if (array_key_exists('link', $item)) {
        $html .= "<li><a href='{$item['link']}'>{$item['title']}</a></li>";
    } elseif (array_key_exists('children', $item)) {
        $childrenHTML = '';
        foreach ($item['children'] as $child) {
            $childrenHTML .= "<li><a href='{$child['link']}'>{$child['title']}</a></li>";
        }
        $html .= "<li>{$item['title']}<ul>{$childrenHTML}</ul></li>";
    }
}
$html .= '</ul>';

echo $html;

/*
 * Your PHP - code here
 */
//$html = <<<HTML
//<ul>
//    <li><a href="/link">TITLE</a></li>
//    <li><a href="/link2">TITLE2</a></li>
//    <li>
//        PARENT 1
//        <ul>
//            <li><a href="/child-link">CHILD</a></li>
//            <li><a href="/child-link2">CHILD2</a></li>
//        </ul>
//    </li>
//</ul>
//HTML;
