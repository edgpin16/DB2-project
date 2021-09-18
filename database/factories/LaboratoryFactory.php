<?php

namespace Database\Factories;

use App\Models\Laboratory;
use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\User;

class LaboratoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Laboratory::class;

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
                $user->assignRole('laboratory_admin');
                return $user->id; 
            },
            'name' => $this->faker->unique()->company(),
            'country' => $this->faker->country(),
            'province' => $this->faker->state(),
            'city' => $this->faker->city(),
        ];
    }
}
