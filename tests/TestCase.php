<?php

namespace Technobase\Alert\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use Technobase\Alert\AlertServiceProvider;

abstract class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    /**
     * Get package providers.
     */
    protected function getPackageProviders($app): array
    {
        return [
            AlertServiceProvider::class,
        ];
    }

    /**
     * Define environment setup.
     */
    protected function getEnvironmentSetUp($app): void
    {
        // Setup default configuration
        config()->set('alert.enabled', true);
        config()->set('alert.chat_id', '-1001234567890');
        config()->set('alert.bot_token', 'test-token');
        config()->set('alert.enabled_environments', ['production', 'staging']);
        config()->set('alert.trace_lines', 10);
    }
}
