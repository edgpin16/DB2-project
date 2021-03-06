<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Pharmacy;
use Illuminate\Database\Eloquent\Factories\Factory;

class PharmacyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pharmacy::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'user_id' => function (){
                $user = User::factory()->create();
                $user->assignRole('pharmacy_admin');
                return $user->id; 
            },
            'name' => $this->faker->company(),
        ];
    }
}
