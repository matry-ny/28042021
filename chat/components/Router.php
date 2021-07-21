<?php

namespace components;

use App;
use helpers\StringsHelper;
use RuntimeException;

class Router
{
    private AbstractDispatcher $dispatcher;

    public function __construct(AbstractDispatcher $dispatcher)
    {
        $this->dispatcher = $dispatcher;
    }

    public function init()
    {
        $controller = $this->getControllerObject();
        $this->callAction($controller);
    }

    private function getControllerObject(): AbstractController
    {
        $class = $this->dispatcher->getControllerPart();
        $class = StringsHelper::camelize($class);
        $class = App::get()->config()->get('controllersNamespace') . "\\{$class}Controller";

        if (!class_exists($class)) {
            throw new RuntimeException("Controller {$this->dispatcher->getControllerPart()} is not exists");
        }

        return new $class();
    }

    private function callAction(AbstractController $controller): void
    {
        $method = $this->dispatcher->getActionPart();
        $method = StringsHelper::camelize($method);
        $method = "action{$method}";

        if (!method_exists($controller, $method)) {
            $message = sprintf(
                'Method "%s" is not exists in controller "%s"',
                $this->dispatcher->getActionPart(),
                $this->dispatcher->getControllerPart()
            );
            throw new RuntimeException($message);
        }

        $controller->{$method}();
    }
}
