<?php

class ExcelExporter implements ExportInterface
{
    public function export(): string
    {
        return 'Data exported to EXCEL';
    }
}