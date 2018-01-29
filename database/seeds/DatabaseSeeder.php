<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create 50 reports
        factory(App\Report::class, 500)->create();

        // Create some tips
        factory(App\Tip::class, 10)->create();
    }
}
