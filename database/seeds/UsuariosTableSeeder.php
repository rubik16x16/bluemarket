<?php

use Illuminate\Database\Seeder;

use App\Models\Usuario;

class UsuariosTableSeeder extends Seeder{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run(){

    for($i= 1; $i < 5 ; $i++){
      Usuario::create([
        'email' => "usuario{$i}@gmail.com",
        'clave' => password_hash('123', PASSWORD_DEFAULT)
      ]);
    }

    Usuario::create([
      'email' => 'drt_mike@hotmail.com',
      'clave' => password_hash('123', PASSWORD_DEFAULT)
    ]);

  }
}
