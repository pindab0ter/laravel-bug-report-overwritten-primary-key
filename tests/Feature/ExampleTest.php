<?php

namespace Tests\Feature;

use App\Models\Bar;
use App\Models\Baz;
use App\Models\Foo;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    public function test_manually_specified_int_id_does_not_get_overridden_when_using_non_autoincrementing_primary_key(): void
    {
        $foo = Foo::create(['id' => 42]);

        $this->assertDatabaseHas('foos', ['id' => 42]);
        $this->assertEquals(42, $foo->id); // Fails, the primary key is overridden
    }

    public function test_manually_specified_string_id_does_not_get_overridden_when_using_non_autoincrementing_primary_key(): void
    {
        $someExternalId = 'uuid-from-external-service';
        $bar = Bar::create(['some_external_id' => $someExternalId]);

        $this->assertDatabaseHas('bars', ['some_external_id' => $someExternalId]);
        $this->assertEquals($someExternalId, $bar->some_external_id); // Fails, the primary key is overridden
    }

    public function test_manually_specified_int_id_does_not_get_overridden_when_using_autoincrementing_primary_key(): void
    {
        $baz1 = Baz::create(['id' => 42]);
        $this->assertDatabaseHas('bazs', ['id' => 42]);
        $this->assertEquals(42, $baz1->id); // Passes, the primary key is not overridden

        $baz2 = Baz::create(['id' => 41]);
        $this->assertDatabaseHas('bazs', ['id' => 41]);
        $this->assertEquals(41, $baz2->id); // Passes, the primary key is not overridden, even though the id is lower than the previous one
    }
}
