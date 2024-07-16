<?php

namespace Mahmoud217TR\StructuredObject;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Mahmoud217TR\StructuredObject\Commands\StructuredObjectCommand;

class StructuredObjectServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('structured-data-for-laravel')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_structured-data-for-laravel_table')
            ->hasCommand(StructuredObjectCommand::class);
    }
}
