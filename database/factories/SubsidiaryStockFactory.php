<?php

namespace Database\Factories;

use App\Models\SubsidiaryStock;
use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Subsidiary;
use App\Models\Laboratory;

class SubsidiaryStockFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SubsidiaryStock::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'subsidiary_id' => Subsidiary::all()->random()->id,
            'serial_number' => $this->faker->unique()->numberBetween(1,99999999),
            'name_laboratory' => Laboratory::all()->random()->name,
            'name_medicine' => $this->faker->sentence(4, false),
            'presentation' => $this->faker->sentence(3, false),
            'main_component' => $this->faker->sentence(3, false),
            'therapeutic_action' => $this->faker->sentence(3, false),
            'price_by_unit' => $this->faker->randomFloat(),
            'quantity' => $this->faker->unique()->numberBetween(1,1000),
        ];
    }
}
