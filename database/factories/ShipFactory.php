<?php

namespace Database\Factories;

use App\Models\Ship;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class ShipFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Ship::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $categories=['barge','vessel'];
        $isscTypes=['Interim ISSC', 'Final ISSC'];
        return [
            'name' => strtoupper($this->faker->unique()->company),
            'category' => $categories[rand(0,1)],
            'call_sign' => $this->faker->bankAccountNumber,
            'nationality_id' => rand(1,20),
            'telephone' => $this->faker->phoneNumber,
            'port' => $this->faker->numerify('###'),
            'imo_number' => $this->faker->creditCardNumber,
            'issc_type' => $isscTypes[rand(0,1)],
            'issc_issue_date' => Carbon::now(),
            'issc_expiry_date' => Carbon::now(),
        ];
    }
}
