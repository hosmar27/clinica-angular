<?php

namespace Database\Factories;

use App\Models\Dentist;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dentist>
 */
class DentistFactory extends Factory
{
    protected $model = Dentist::class;

    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'name' => $this->faker->name(),
            'cpf' => $this->faker->numerify('###########'),
            'phone' => $this->faker->phoneNumber(),
            'cip' => $this->faker->bothify('CIP#####'),
        ];
    }
}
