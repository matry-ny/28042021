<?php

class SkillUpException extends Exception
{
}

function errorGenerator()
{
    $randomInt = random_int(0, 5);
    var_dump($randomInt);

    switch ($randomInt) {
        case 0:
            throw new SkillUpException('Test exception demonstration', 543);
        case 1:
            throw new RuntimeException('Other exception', 12);
        case 2:
            throw new LogicException();
        case 3:
            throw new OutOfRangeException();
    }

    echo 'HHHHHHH';
}

try {
    errorGenerator();
} catch (SkillUpException $exception) {
    var_dump($exception);
} catch (RuntimeException $exception) {
    var_dump($exception);
    echo($exception->getTraceAsString());
} catch (Exception $exception) {
    var_dump('log', $exception);
} finally {
    echo '<br>That\'s all folks!<br>';
}

echo 'LLLLLLLLLL';
