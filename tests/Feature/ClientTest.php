<?php

namespace Tests\Feature;

use App\Client;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ClientTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function isAboutToExpireFunctionality()
    {
        $client = factory(Client::class)->create([
            'join_date'     => now(),
            'sub_end_date'  => now()->addYear()
        ]);

        $this->assertFalse($client->isAboutToExpire());

        $client = factory(Client::class)->create([
            'join_date'     => now(),
            'sub_end_date'  => now()->addMonth()
        ]);

        $this->assertFalse($client->isAboutToExpire());

        $client = factory(Client::class)->create([
            'join_date'     => now(),
            'sub_end_date'  => now()->addWeek()
        ]);

        $this->assertTrue($client->isAboutToExpire());

        $client = factory(Client::class)->create([
            'join_date'     => now(),
            'sub_end_date'  => now()->addDay()
        ]);

        $this->assertTrue($client->isAboutToExpire());
    }

    /** @test */
    public function hasExpiredFunctionality()
    {
        $client = factory(Client::class)->create([
            'join_date'     => now(),
            'sub_end_date'  => now()->addDay()
        ]);

        $this->assertFalse($client->hasExpired());

        $client = factory(Client::class)->create([
            'join_date'     => now(),
            'sub_end_date'  => now()->addMinute()
        ]);

        $this->assertFalse($client->hasExpired());

        $client = factory(Client::class)->create([
            'join_date'     => now(),
            'sub_end_date'  => now()->subDay()
        ]);

        $this->assertTrue($client->hasExpired());

        $client = factory(Client::class)->create([
            'join_date'     => now(),
            'sub_end_date'  => now()->subMinute()
        ]);

        $this->assertTrue($client->hasExpired());
    }

    /** @test */
    public function expiredScope()
    {
        $client = factory(Client::class)->create([
            'join_date'     => now(),
            'sub_end_date'  => now()->subDay()
        ]);

        $expired = Client::expired()->get();

        $this->assertEquals($client->id, $expired[0]->id);
    }
}
