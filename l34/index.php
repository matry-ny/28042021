<?php

require_once __DIR__ . '/ExportInterface.php';
require_once __DIR__ . '/PrintExporter.php';
require_once __DIR__ . '/ExcelExporter.php';
require_once __DIR__ . '/ScreenExporter.php';
require_once __DIR__ . '/ExportFactory.php';

$factory = new ExportFactory();
echo $factory->getExporter(ExportFactory::PRINTER)->export();
