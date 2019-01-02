<?php

use Faker\Generator as Faker;
use App\Models\User;
use App\Models\Categoria;

$factory->define(App\Models\Producto::class, function (Faker $faker) {

  return [
    'nombre' => $faker->text(10),
    'existencia' => $faker->numberBetween($min = 1, $max = 500),
    'precio' => $faker->randomFloat(2, 10.00, 3000.00),
    'descripcion' => $faker->text(200),
    'user_id' => User::all()->random()->id,
    'categoria_id' => Categoria::all()->random()->id
  ];
});
