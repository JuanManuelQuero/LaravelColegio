<?php

namespace Database\Factories;

use App\Models\Asignatura;
use App\Models\Profesor;
use Illuminate\Database\Eloquent\Factories\Factory;

class AsignaturaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Asignatura::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $profesores = Profesor::all('id');
        return [
            'nombre' => $this->faker->word(),
            'descripcion' => $this->faker->text($maxNbChars = 100),
            'creditos' => $this->faker->numberBetween($min = 0, $max = 50),
            'profesor_id' => $profesores->get(rand(0, count($profesores)-1))
        ];
    }
}
