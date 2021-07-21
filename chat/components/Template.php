<?php

namespace components;

use RuntimeException;

class Template
{
    private string $viewsDir;
    private string $layoutsDir;
    private string $defaultLayout;
    private string $existedVariablePrefix;

    public function __construct(
        string $viewsDir,
        string $layoutsDir,
        string $defaultLayout,
        string $existedVariablePrefix
    ) {
        $this->viewsDir = $viewsDir;
        $this->layoutsDir = $layoutsDir;
        $this->defaultLayout = $defaultLayout;
        $this->existedVariablePrefix = $existedVariablePrefix;
    }

    public function render(string $template, array $vars = [], string $layout = ''): string
    {
        extract($vars,  EXTR_PREFIX_SAME, $this->existedVariablePrefix);

        $templateFile = $this->getTemplateFile($template);
        ob_start();
        require $templateFile;
        $content = ob_get_clean();

        $layout = $layout ?: $this->defaultLayout;
        $layoutFile = $this->getTemplateFile("{$this->layoutsDir}/{$layout}");
        ob_start();
        require $layoutFile;
        return ob_get_clean();
    }

    private function getTemplateFile(string $template): string
    {
        $file = "{$this->viewsDir}/{$template}.php";
        if (!file_exists($file)) {
            throw new RuntimeException("Template '{$template}' is not exists");
        }

        return $file;
    }
}
