<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class TestCommand extends Command
{
    protected $signature = 'test:show-url';

    protected $description = 'Shows application web url';

    public function handle()
    {
        var_dump(url('assets/img/profile-thumbnail.png'));
    }
}
