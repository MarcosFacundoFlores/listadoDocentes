<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Docente;

class DocenteFactory extends Factory
{
   
    protected $model = Docente::class;
   

   /*  @return array<string, mixed> */
    /**
     * Define the model's default state.
     *
     *
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->email(),
            'suplente' => $this->faker->boolean(),
        ];
    }
}
