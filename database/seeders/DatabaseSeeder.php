<?php

namespace Database\Seeders;
use Database\Seeders\DeputiesSeeder;
use Database\Seeders\DeputyExpenseSeeder;
use Database\Seeders\SocialMediaSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(DeputiesSeeder::class);
        $this->call(SocialMediaSeeder::class);
        $this->call(DeputyExpenseSeeder::class);

    }
}
