<?php

namespace PrestTEC\Tests\Trello;

use PrestTEC\Trello\Facades\Trello;
use PrestTEC\Trello\TrelloServiceProvider;
use Orchestra\Testbench\TestCase;

abstract class AbstractTestCase extends TestCase
{
    protected function getPackageProviders($app)
    {
        return [TrelloServiceProvider::class];
    }

    protected function getPackageAliases($app)
    {
        return ['Trello' => Trello::class];
    }
    /**
     * Define environment setup.
     *
     * @param  \Illuminate\Foundation\Application  $app
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('session.driver', 'array');
    }
}
