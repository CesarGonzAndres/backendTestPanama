<?php

use Illuminate\Database\Seeder;

class OrigenesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Origen::class, 50)->create();
    }
}
