<?php

/**
 * Class Magic
 *
 * @property int $test
 * @property string $qqqqq
 */
class Magic
{
    private array $storage = [];

    public string $name;

    public function __construct(string $spell)
    {
        var_dump("Spell '{$spell}' is called");
    }

    public function __set(string $key, mixed $value): void
    {
        $this->storage[$key] = $value;
    }

    public function __get(string $key): mixed
    {
        return $this->storage[$key] ?? null;
    }

    public function __isset(string $key): bool
    {
        return array_key_exists($key, $this->storage);
    }

    public function __destruct()
    {
        var_dump('Object is destroyed');
    }
}

$magic = new Magic('Avada Kedavra');

$magic->test = 123;
$magic->qqqqq = 'testss';
$magic->name = 'Volan De Mort';

var_dump($magic);

//unset($magic);

var_dump($magic->test, $magic->qqqqq);

var_dump(isset($magic->test));
