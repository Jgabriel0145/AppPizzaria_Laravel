<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Clientes>
 */
class ClientesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $cpf = '';
        $cep = '';
        for ($i = 0; $i < 12; $i++)
        {
            $cpf .= strval($this->faker->randomDigit());
        }
        
        for ($i = 0; $i < 9; $i++)
        {
            $cep .= strval($this->faker->randomDigit());
        }

        return [
            'nome' => $this->faker->name(),
            'cpf' => $cpf,
            'email' => $this->faker->email(),
            'telefone' => $this->faker->phoneNumber(),
            'cep' => $cep
        ];
    }
}
