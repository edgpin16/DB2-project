<?php

namespace Database\Factories;

use App\Models\MinorInter;
use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Intern;

class MinorInterFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MinorInter::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'intern_id' => function(){
                return Intern::factory()->create()->id;
            },
            'licence_number' => $this->faker->randomNumber(8),
        ];
    }
}
