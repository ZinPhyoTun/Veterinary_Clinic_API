<?php

namespace Database\Factories;

use App\Models\Patient;
use Illuminate\Database\Eloquent\Factories\Factory;

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
            'patient_id' => $this->faker->randomElement($array = array ('B-0025','S-0189', 'G-0089', 'G-0090')),
            'pet_name' => $this->faker->randomElement($array = array ('Milo','MJ', 'Lu Lu', 'Sky')),
            'status' => rand(0, 1),
            'parent' => $this->faker->name,
            'breed' => $this->faker->randomElement($array = array ('Beagle','Spaniel', 'Golden Retriever')),
            'gender' => $this->faker->randomElement($array = array ('male','female')),
            'dob' => $this->faker->date($format = 'd-m-Y', $max = 'now'),
            'contact_phone' => '09' . rand(600000000, 999999999),
            'address' => $this->faker->address
        ];
    }
}
