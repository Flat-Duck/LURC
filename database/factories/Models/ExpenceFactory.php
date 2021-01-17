<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Expence;
use App\Models\Material;

class ExpenceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Expence::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'material_id' => Material::factory(),
            'price' => $this->faker->randomFloat(2, 0, 999999.99),
            'invoice' => $this->faker->word,
        ];
    }
}
