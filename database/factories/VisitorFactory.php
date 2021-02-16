<?php

namespace Database\Factories;

use App\Models\Visitor;
use Illuminate\Database\Eloquent\Factories\Factory;

class VisitorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Visitor::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'citizen_no' => $this->faker->numerify('################'),
            'phone_no' => $this->faker->numerify('###########'),
            'name' => $this->faker->name,
            'people_amount' => 1,
            'pos_lat' => $this->faker->latitude,
            'pos_long' => $this->faker->longitude
        ];
    }
}
