<?php

class PrintExporter implements ExportInterface
{
    public function export(): string
    {
        return 'Data send to printer';
    }
}