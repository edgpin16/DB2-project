<?php

namespace Database\Factories;

use App\Models\Pharmacy;
use App\Models\Subsidiary;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubsidiaryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Subsidiary::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->unique()->company();
        return [
            //
            'pharmacy_id' => Pharmacy::all()->random()->id,
            'name' => $name,
            'slug' => Str::slug($name),
            'city' => $this->faker->city(),
            'province' => $this->faker->state(),
        ];
    }
}
