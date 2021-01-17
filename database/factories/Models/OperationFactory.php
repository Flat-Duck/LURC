<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Doctor;
use App\Models\Operation;
use App\Models\Patient;
use App\Models\Service;

class OperationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Operation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'service_id' => Service::factory(),
            'doctor_id' => Doctor::factory(),
            'patient_id' => Patient::factory(),
            'lab' => $this->faker->randomFloat(2, 0, 999999.99),
            'price' => $this->faker->randomFloat(2, 0, 999999.99),
            'notes' => $this->faker->text,
        ];
    }
}
