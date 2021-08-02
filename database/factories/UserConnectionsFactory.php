<?php

namespace Database\Factories;

use App\Models\UserConnections;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class UserConnectionsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UserConnections::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $userIds = $this->faker->randomElements(DB::table('users')->pluck('id')->all(), $count = 2, $allowDuplicates = false);

        return [
            'user1_id' => $userIds[0],
            'user2_id' => $userIds[1],
        ];
    }
}
