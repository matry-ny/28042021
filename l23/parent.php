<?php

class A
{
    private int $id;

    public function __construct(int $id)
    {
        $this->id = $id;
    }

    public function test(): void
    {
        echo 'Hello from A class<br>';
    }
}

class B extends A
{
    private string $title;

    public function __construct(int $id, string $title)
    {
        parent::__construct($id);
        $this->title = $title;
    }


    public function test(): void
    {
        parent::test();
        echo 'Hello from B class<br>';
    }
}

$object = new B(12, 'qqqqq');
$object->test();

var_dump($object);
