<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Funcionarios>
 */
class FuncionariosFactory extends Factory
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
            'senha' => Hash::make('password'),
            'administrador' => $this->faker->randomElement([0, 1])
        ];
    }
}
