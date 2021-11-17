<?php

declare(strict_types=1);

namespace Blockpc\StorageLink\Tests;

use Orchestra\Testbench\TestCase as TestbenchTestCase;
use Blockpc\StorageLink\Providers\StorageLinkServiceProvider;

class TestCase extends TestbenchTestCase
{
    protected function getPackageProviders($app)
    {
        return [
            StorageLinkServiceProvider::class
        ];
    }
}