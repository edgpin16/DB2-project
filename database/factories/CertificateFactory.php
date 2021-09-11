<?php

namespace Database\Factories;

use App\Models\Certificate;
use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Pharmaceutist;

class CertificateFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Certificate::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'registry_number' => $this->faker->unique()->randomNumber(8),
            'pharmaceutist_id' => function (){
                return Pharmaceutist::factory()->create()->id; 
            },
            'university' => $this->faker->company(),
            'date_registration' => $this->faker->date('Y-m-d', 'now'),
        ];
    }
}
