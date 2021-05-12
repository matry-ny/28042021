<?php

$fruit = 'apple';
$exoticFruit = $fruit;
echo $fruit, '<br>', $exoticFruit, '<br>';

$fruit = 'pear';
$exoticFruit = 'banana';
echo $fruit, '<br>', $exoticFruit, '<hr>';

$exoticFruit = &$fruit;
echo $fruit, '<br>', $exoticFruit, '<br>';
$exoticFruit = 'grape';
$fruit = 'garlic';
echo $fruit, '<br>', $exoticFruit, '<hr>';

$text = 'qwerty';
$$text = 123;

echo $$text, '<br>', $qwerty, '<br>';

$one = 'q';
$q = 'w';
$$$one = 555;
echo $w;
