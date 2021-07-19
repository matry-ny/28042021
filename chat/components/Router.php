<?php

namespace components;

use components\dispatchers\AbstractDispatcher;

class Router
{
    public function __construct(AbstractDispatcher $dispatcher)
    {
        var_dump($dispatcher->getControllerPart(), $dispatcher->getActionPart());
    }
}
