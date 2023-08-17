<?php

namespace Database\Factories;

use App\Constants\Enum;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $statuses = [
            Enum::NEW,
            Enum::PREPARATION,
            Enum::SHIPPED,
            Enum::CLEARANCE,
            Enum::DELIVERING,
            Enum::DELIVERED
        ];

        $randomStatus = $statuses[array_rand($statuses)];

        return [
            'price' => rand(50,150),
            'user_id' => rand(2,10),
            'status' => $randomStatus
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
