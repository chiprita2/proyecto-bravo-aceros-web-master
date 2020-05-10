<?php

use Illuminate\Database\Seeder;

class SeoSeeder extends Seeder
{
  /**
   * Run the database seeds php artisan db:seed --class=SeoSeeder
   *
   * @return void
   */
  public function run()
  {
    DB::table('seos')->insert([
      [
        'url' => '/',
        'title' => 'Inicio',
        'description' => Str::random(50),
        'keywords' => Str::random(50),
      ], [
        'url' => '/tienda',
        'title' => 'Tienda',
        'description' => Str::random(50),
        'keywords' => Str::random(50),
      ], [
        'url' => '/carro-de-compra',
        'title' => 'Carro de compra',
        'description' => Str::random(50),
        'keywords' => Str::random(50),
      ],
      [

        'url' => '/proceso-de-compra',
        'title' => 'Proceso de compra',
        'description' => Str::random(50),
        'keywords' => Str::random(50),
      ],
      [

        'url' => '/gracias-por-su-compra',
        'title' => 'Gracias por su compra',
        'description' => Str::random(50),
        'keywords' => Str::random(50),
      ], [

        'url' => '/mi-cuenta',
        'title' => 'Mi cuenta',
        'description' => Str::random(50),
        'keywords' => Str::random(50),
      ], [

        'url' => '/mi-cuenta/pedidos',
        'title' => 'Pedidos',
        'description' => Str::random(50),
        'keywords' => Str::random(50),
      ],
      [

        'url' => '/mi-cuenta/personal',
        'title' => 'Personal',
        'description' => Str::random(50),
        'keywords' => Str::random(50),
      ],
      [

        'url' => '/contacto',
        'title' => 'Contacto',
        'description' => Str::random(50),
        'keywords' => Str::random(50),
      ],
      [

        'url' => '/iniciar-sesion',
        'title' => 'Iniciar sesion',
        'description' => Str::random(50),
        'keywords' => Str::random(50),
      ],
      [

        'url' => '/registro',
        'title' => 'Registro',
        'description' => Str::random(50),
        'keywords' => Str::random(50),
      ]
    ]);
  }
}
