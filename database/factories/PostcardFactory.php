<?php

namespace Database\Factories;

use App\Models\Postcard;
use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Postcard>
 */
class PostcardFactory extends Factory
{
    /**
     * @var string
     */
    protected $model = Postcard::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $onlineAt = Carbon::parse('- ' . mt_rand(1, 30) . ' days');

        return [
            'title' => $this->faker->unique()->sentence(),
            'team_id' => 1,
            'user_id' => 1,
            'price' => $this->faker->numberBetween(5, 777),
            'is_draft' => $this->faker->numberBetween(0, 1) == true,
            'online_at' => $onlineAt,
            'offline_at' => $onlineAt->addDays(60),
            'created_at' => $onlineAt->subMinutes(10),
            'updated_at' => $onlineAt->subMinutes(10),
        ];
    }
}
