<?php

abstract class Animal
{
    protected int $paws = 4;

    public function run(): void
    {
        echo static::class, ' runs fast<br>';
    }

    abstract public function makeSound(int $repeats): void;
}

class Cat extends Animal
{
    public function makeSound(int $repeats): void
    {
        for (; $repeats > 0; $repeats--) {
            echo 'Meow<br>';
        }
    }
}

class Dog extends Animal
{
    public function makeSound(int $repeats): void
    {
        for (; $repeats > 0; $repeats--) {
            echo 'Woof<br>';
        }
    }
}

$cat = new Cat();
$dog = new Dog();

$cat->run();
$dog->run();

$cat->makeSound(1);
$dog->makeSound(3);

var_dump(
    $cat instanceof Animal,
    $dog instanceof Animal,
    $cat,
    $dog
);

function initAnimal(Animal $animal)
{
    $animal->run();
    $animal->makeSound(2);
}

initAnimal($dog);
initAnimal($cat);
