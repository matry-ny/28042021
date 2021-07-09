<?php

class Test
{
    public string $status = 'passed';
    public bool $isOk = false;
    protected array $cases = [1, 2, 3];
    private int $time = 123123312;

    public function itarate()
    {
        foreach ($this as $property => $value) {
            var_dump($property, $value);
        }
    }
}

$o1 = new Test();
$o2 = $o1;
$o3 = clone $o1;

$o2->status = 'in_progress';
$o3->status = 'done';

var_dump($o1, $o2, $o3);

foreach ($o1 as $property => $value) {
    var_dump("{$property} => {$value}");
}

echo '-----<br><br>';

$o1->itarate();
