<?php

namespace Database\Factories;

use App\Models\Intern;
use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Employeer;

class InternFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Intern::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'employeer_CI' => function (){
                return Employeer::factory()->create(['category' => 'intern'])->CI; //Creo los empleados
            },
            'university' => $this->faker->company(),
            'specialty' => $this->faker->jobTitle(),
            'start_internship' => $this->faker->date('Y-m-d', 'now'),
            'end_internship' => $this->faker->date('Y-m-d', 'now'),
            'continue_working' => $this->faker->boolean(),
        ];
    }
}
