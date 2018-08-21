<?php

use Illuminate\Database\Seeder;

use App\Models\Admin;

class AdminsTableSeeder extends Seeder{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run(){

    Admin::create([
      'email' => 'drt_mike@gmail.com',
      'clave' => password_hash('123', PASSWORD_DEFAULT)
    ]);

  }
}
