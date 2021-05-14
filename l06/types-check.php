<?php

$var = '123';

var_dump(is_bool($var));
var_dump(is_int($var));
var_dump(is_array($var));
var_dump(is_string($var));
var_dump(is_numeric($var));

$varNull = null;

var_dump(isset($var));
var_dump(isset($var123));
var_dump(isset($varNull));

$varZero = 0;

var_dump(empty($var));
var_dump(empty($varNull));
var_dump(empty($varZero));
var_dump(empty($var123));
