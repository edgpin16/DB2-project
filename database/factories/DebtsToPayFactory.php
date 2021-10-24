<?php

namespace Database\Factories;

use App\Models\DebtsToPay;
use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Order;
use App\Models\Subsidiary;
use App\Models\Laboratory;

class DebtsToPayFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DebtsToPay::class;

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
            'subsidiary_id' => Subsidiary::all()->random()->id,
            'laboratory_id' => Laboratory::all()->random()->id,
            'amount_to_pay' => $this->faker->randomFloat(),
        ];
    }
}
