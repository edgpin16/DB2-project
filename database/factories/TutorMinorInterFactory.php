<?php

namespace Database\Factories;

use App\Models\TutorMinorInter;
use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\MinorInter;

class TutorMinorInterFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TutorMinorInter::class;

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
            'minor_intern_id' => function(){
                return MinorInter::factory()->create()->id;
            },
            'name' => $this->faker->firstName(),
            'surname' => $this->faker->lastName(),
            'date_birth' => $this->faker->date('Y-m-d', 'now'),
        ];
    }
}
