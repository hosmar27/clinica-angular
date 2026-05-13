<?php

namespace Database\Factories;

use App\Models\Patient;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Patient>
 */
class PatientFactory extends Factory
{
    protected $model = Patient::class;

    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'name' => $this->faker->name(),
            'cpf' => $this->faker->numerify('###########'),
            'phone' => $this->faker->phoneNumber(),
            'birth_date' => $this->faker->date(),
        ];
    }
}
