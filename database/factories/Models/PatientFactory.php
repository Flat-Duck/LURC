<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Patient;

class PatientFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Patient::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'phone' => $this->faker->phoneNumber,
            'email' => $this->faker->safeEmail,
            'birth_date' => $this->faker->date(),
            'gender' => $this->faker->randomElement(["male","female"]),
            'blood_type' => $this->faker->word,
            'notes' => $this->faker->text,
            'status' => $this->faker->randomElement(["contenue","finish"]),
            'payment' => $this->faker->randomElement(["cash","card","check"]),
            'debt' => $this->faker->randomFloat(0, 0, 9999999999.),
            'payed' => $this->faker->randomFloat(0, 0, 9999999999.),
        ];
    }
}
