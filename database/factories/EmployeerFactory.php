<?php

namespace Database\Factories;

use App\Models\Employeer;
use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Subsidiary;

class EmployeerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Employeer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'CI' => $this->faker->unique()->numberBetween(1,99999999),
            'subsidiary_id' => Subsidiary::all()->random()->id,
            'name' => $this->faker->firstName(),
            'surname' => $this->faker->lastName(),
            'date_birth' => $this->faker->date('Y-m-d', 'now'),
            'salary' => $this->faker->randomFloat(),
            'category' => $this->faker->randomElement(['administrative', 'auxiliaryPharmacy', 'Analyst', 'intern', 'minorInter']),
        ];
    }
}
