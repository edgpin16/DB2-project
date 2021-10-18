<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Order;
use App\Models\Medicine;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'order_id' => Order::all()->random()->id,
            'serial_number_medicine' => Medicine::all()->random()->serial_number,
            'quantity' => $this->faker->numberBetween(1,1000),
        ];
    }
}
