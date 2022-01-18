<?php

namespace Database\Factories\System;

use App\Models\System\Account;
use Illuminate\Database\Eloquent\Factories\Factory;

class AccountFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Account::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'bank' => $this->faker->name,
            'number_account' => $this->faker->creditCardNumber,
            'name_account' => $this->faker->name,
        ];
    }
}
