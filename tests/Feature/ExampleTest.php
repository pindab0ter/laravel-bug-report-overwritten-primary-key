<?php

namespace Tests\Feature;

use App\Models\Bar;
use App\Models\Foo;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    public function test_manually_specified_int_id_does_not_get_overridden(): void
    {
        $foo = Foo::create(['id' => 42]);

        $this->assertDatabaseHas('foos', ['id' => 42]);
        $this->assertEquals(42, $foo->id);
    }

    public function test_manually_specified_string_id_does_not_get_overridden(): void
    {
        $someExternalId = 'uuid-from-external-service';
        $bar = Bar::create(['some_external_id' => $someExternalId]);

        $this->assertDatabaseHas('bars', ['some_external_id' => $someExternalId]);
        $this->assertEquals($someExternalId, $bar->some_external_id);
    }
}
