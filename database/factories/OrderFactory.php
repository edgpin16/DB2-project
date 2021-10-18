<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Subsidiary;
use App\Models\Laboratory;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

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
            'laboratory_id' => Laboratory::all()->random()->id,
            'analist' => $this->faker->name(),
            'payment_type' => $this->faker->randomElement(['Decontado', 'Credito']),
            'payment_date' => $this->faker->date('Y-m-d', 'now'),
            'status' => $this->faker->boolean(),
        ];
    }
}
