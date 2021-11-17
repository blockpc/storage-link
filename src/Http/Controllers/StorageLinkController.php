<?php

declare(strict_types=1);

namespace Blockpc\StorageLink\Http\Controllers;

use Illuminate\Filesystem\Filesystem;

final class StorageLinkController
{
    public function __invoke(Filesystem $filesystem)
    {
        if ( $filesystem->exists( public_path('storage')) ) {
            return "The [public/storage] directory already exists.";
        }

        $filesystem->link(
            storage_path('app/public'), public_path('storage')
        );

        return 'The [public/storage] directory has been linked.';
    }
}