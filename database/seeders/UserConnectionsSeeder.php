<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UserConnections;

class UserConnectionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserConnections::factory()
            ->count(3)
            ->create();
    }
}
