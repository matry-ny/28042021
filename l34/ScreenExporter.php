<?php

class ScreenExporter implements ExportInterface
{
    public function export(): string
    {
        return 'Data rendered on the screen';
    }
}