<?php

namespace Database\Factories;

use App\Models\Certificate;
use Illuminate\Database\Eloquent\Factories\Factory;

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
            'university' => $this->faker->company(),
            'date_registration' => $this->faker->date('Y-m-d', 'now'),
        ];
    }
}
