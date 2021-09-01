<?php

class ExportFactory
{
    public const PRINTER = 'printer';
    public const EXCEL = 'excel';
    public const SCREEN = 'screen';

    public function getExporter(string $type): ExportInterface
    {
        return match ($type) {
            self::EXCEL => new ExcelExporter(),
            self::PRINTER => new PrintExporter(),
            self::SCREEN => new ScreenExporter(),
            default => throw new RuntimeException('Exporter type is invalid'),
        };
    }
}