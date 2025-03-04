<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'transaction_id' => fake()->unique()->shuffle('ABCDEF1234567'),
            'date' => fake()->date(now()->subYears(10)),
            'amount' => fake()->randomNumber(5),
            'descriptor' => fake()->sentence(4),
        ];
    }
}
