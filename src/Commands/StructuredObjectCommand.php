<?php

namespace Mahmoud217TR\StructuredObject\Commands;

use Illuminate\Console\Command;

class StructuredObjectCommand extends Command
{
    public $signature = 'structured-data-for-laravel';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
