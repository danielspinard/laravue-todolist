<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        \App\Models\Item::factory(10)->create();
    }
}
