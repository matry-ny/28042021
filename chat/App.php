<?php

use components\Config;
use components\Router;
use components\AbstractDispatcher;
use cli\components\CliDispatcher;
use components\Session;
use components\Template;
use web\components\WebDispatcher;

final class App
{
    public const CONFIG = 'config';
    public const ROUTER = 'router';
    public const TEMPLATE = 'template';
    public const SESSION = 'session';

    private array $storage = [];

    private function __construct(array $config)
    {
        $this->setConfig($config);
    }

    private function __clone()
    {}

    private static ?self $instance = null;

    public static function run(array $config): self
    {
        if (self::$instance !== null) {
            throw new RuntimeException('Application is already initialized!');
        }

        self::$instance = new self($config);

        self::$instance
            ->setSession()
            ->setTemplate()
            ->setRouter();

        return self::$instance;
    }

    public static function get(): self
    {
        if (self::$instance === null) {
            throw new RuntimeException('Application is not initialized yet!');
        }

        return self::$instance;
    }

    public function config(): Config
    {
        return $this->storage[self::CONFIG];
    }

    public function template(): ?Template
    {
        return $this->storage[self::TEMPLATE] ?? null;
    }

    public function session(): ?Session
    {
        return $this->storage[self::SESSION] ?? null;
    }

    private function setConfig(array $config): self
    {
        $this->storage[self::CONFIG] = new Config($config);
        return $this;
    }

    private function setSession(): self
    {
        if ($this->config()->get('initSession') === false) {
            return $this;
        }

        $this->storage[self::SESSION] = new Session();
        return $this;
    }

    private function setTemplate(): self
    {
        $config = $this->config()->get('template');
        if (!$config) {
            return $this;
        }

        $this->storage[self::TEMPLATE] = new Template(
            $config['viewsDir'],
            $config['layoutsDir'],
            $config['defaultLayout'],
            $config['existedVariablePrefix']
        );
        return $this;
    }

    private function setRouter(): self
    {
        $dispatcher = $this->getDispatcher();
        $router = new Router($dispatcher);
        $router->init();

        $this->storage[self::ROUTER] = $router;
        return $this;
    }

    private function getDispatcher(): AbstractDispatcher
    {
        if (strtolower(PHP_SAPI) === 'cli') {
            return new CliDispatcher();
        }

        return new WebDispatcher();
    }
}
