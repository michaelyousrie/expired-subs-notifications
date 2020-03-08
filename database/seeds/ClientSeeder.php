<?php

use App\Client;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Client::class, 5)->create();
        factory(Client::class, 5)->create([
            'sub_end_date'  => now()->subYear()
        ]);
    }
}
