<?php

namespace PrestTEC\Tests\Trello;

use PrestTEC\Trello\TrelloManager;

class ServiceProviderTest extends AbstractTestCase
{
    public function testInstantiated()
    {
        $instance = $this->app->make('trello');

        $this->assertInstanceOf(TrelloManager::class, $instance);
    }
}
