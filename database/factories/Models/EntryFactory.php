<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Entry;
use App\Models\Medicine;
use App\Models\Prescription;

class EntryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Entry::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'medicine_id' => Medicine::factory(),
            'prescription_id' => Prescription::factory(),
            'rx' => $this->faker->word,
        ];
    }
}
