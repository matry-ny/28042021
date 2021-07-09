<?php

class A
{
    public static function getClassName(): string
    {
        return static::class;
    }
}

class B extends A
{
}

class C extends B
{
}

var_dump(
    A::getClassName(),
    B::getClassName(),
    C::getClassName()
);