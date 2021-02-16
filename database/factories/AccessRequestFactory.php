<?php

namespace Database\Factories;

use App\Models\AccessRequest;
use Illuminate\Database\Eloquent\Factories\Factory;

class AccessRequestFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AccessRequest::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'phone' => $this->faker->numerify('+62###########'),
            'company_name' => $this->faker->company,
            'company_address' => $this->faker->address,
            'company_email' => $this->faker->unique()->companyEmail,
            'company_position' => $this->faker->jobTitle,
            'status' => 'pending',
        ];
    }
}
