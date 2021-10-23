<?php

namespace Database\Factories;

use App\Models\Medicine;
use App\Models\Laboratory;
use Illuminate\Database\Eloquent\Factories\Factory;

class MedicineFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Medicine::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'serial_number' => $this->faker->unique()->numberBetween(1,99999999),
            'laboratory_id' => Laboratory::all()->random()->id,
            'name_medicine' => $this->faker->sentence(4, false),
            'presentation' => $this->faker->sentence(3, false),
            'main_component' => $this->faker->sentence(3, false),
            'therapeutic_action' => $this->faker->sentence(3, false),
            'price' => $this->faker->randomFloat(),
        ];
    }
}
