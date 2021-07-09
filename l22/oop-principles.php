<?php

declare(strict_types=1);

class GrandFather
{
    private bool $demencia = true;

    public function setDemencia(bool $isDemencia): void
    {
        $this->demencia = $isDemencia;
    }

    protected function work()
    {
        echo 'Make tables<br>';
    }
}

class Father extends GrandFather
{
    protected string $eyeColor = 'brown';
    protected string $hairsColor = 'blond';
    protected float $height = 2.05;

    protected function work(): string
    {
        return 'Make tables';
    }
}

class Son extends Father
{
    protected float $height = 1.82;

    public function work(): string
    {
        return 'Write PHP code';
    }
}

$son = new Son();

var_dump($son, $son->work());

$grandFather = new GrandFather();
$grandFather->setDemencia(false);

var_dump($grandFather);

var_dump($son instanceof GrandFather);
var_dump($grandFather instanceof Father);
