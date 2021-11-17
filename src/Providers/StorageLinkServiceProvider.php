<?php

declare(strict_types=1);

namespace Blockpc\StorageLink\Providers;

use Illuminate\Support\ServiceProvider;

final class StorageLinkServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(
            $this->fromPath('routes/web.php')
        );
    }

    public function register()
    {
        //
    }

    protected function fromPath(string $route = '')
    {
        return __DIR__.'/../../'.$route;
    }
}