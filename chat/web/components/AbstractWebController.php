<?php

namespace web\components;

use App;
use components\AbstractController;
use helpers\ComponentsTrait;

abstract class AbstractWebController extends AbstractController
{
    use ComponentsTrait;

    public function __construct()
    {
        $guestPages = App::get()->config()->get('guestPages');
        $currentPage = App::get()->router()->getCurrentPage();
        if (App::get()->user()->isGuest() && !in_array($currentPage, $guestPages, true)) {
            $this->redirect(App::get()->config()->get('loginPage'));
        }
    }

    protected function redirect(string $url, int $status = 301, bool $terminate = true): void
    {
        header("Location: {$url}", true, $status);
        if ($terminate) {
            exit;
        }
    }

    protected function render(string $template, array $vars = [], string $layout = ''): void
    {
        echo App::get()->template()?->render($template, $vars, $layout);
    }
}
