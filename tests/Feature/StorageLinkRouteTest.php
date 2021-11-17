<?php

declare(strict_types=1);

namespace Blockpc\StorageLink\Tests\Feature;

use Blockpc\StorageLink\Tests\TestCase;
use Illuminate\Filesystem\Filesystem;

final class StorageLinkRouteTest extends TestCase
{
    /** @test */
    public function can_create_the_storage_link_from_route()
    {
        $this->withoutExceptionHandling();

        $spy = $this->spy(Filesystem::class);

        $response = $this->get('storage-link');

        $response->assertSuccessful()
            ->assertSee('The [public/storage] directory has been linked.');

        $spy->shouldHaveReceived('link')->with(
            storage_path('app/public'), public_path('storage')
        );

        $spy->shouldHaveReceived('exists')->with(
            public_path('storage')
        );
    }

    /** @test */
    public function cannot_create_the_storage_link_from_route()
    {
        $this->mock(Filesystem::class)->shouldReceive('exists')->andReturn(true);

        $response = $this->get('storage-link');

        $response->assertSuccessful()
            ->assertSee('The [public/storage] directory already exists.');
    }
}