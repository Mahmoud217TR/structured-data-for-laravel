<?php

namespace Mahmoud217TR\StructuredObject\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use Mahmoud217TR\StructuredObject\StructuredObjectServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'Mahmoud217TR\\StructuredObject\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );
    }

    protected function getPackageProviders($app)
    {
        return [
            StructuredObjectServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');

        /*
        $migration = include __DIR__.'/../database/migrations/create_structured-data-for-laravel_table.php.stub';
        $migration->up();
        */
    }
}
