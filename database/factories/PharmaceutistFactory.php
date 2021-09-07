<?php

namespace Database\Factories;

use App\Models\Pharmaceutist;
use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Employeer;
use App\Models\Certificate;

class PharmaceutistFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pharmaceutist::class;

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
                return Employeer::factory()->create(['category' => 'pharmaceutist'])->CI; //Creo los empleados
            },
            'certificate_registry_number' => function(){
                return Certificate::factory()->create()->registry_number; //Creo los titulos
            },
            'sanitary_permise_number' => $this->faker->randomNumber(8),
            'schooling_number' => $this->faker->randomNumber(8),
        ];
    }
}
