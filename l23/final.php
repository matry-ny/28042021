<?php

final class A
{
    final public function test(): string
    {
        return __METHOD__;
    }

    public function qwerty(): string
    {
        return __METHOD__;
    }
}

class B
{
    public function qwerty(): string
    {
        return __METHOD__;
    }
}

$a = new A();
$b = new B();
var_dump(
    $a->test(),
    $b->qwerty()
);
