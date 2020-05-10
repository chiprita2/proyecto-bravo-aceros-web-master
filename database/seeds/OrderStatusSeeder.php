<?php

use Illuminate\Database\Seeder;

class OrderStatusSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    DB::table('order_status')->insert([
      [
        'name' => 'Pendiente de pago',
        'status' => true
      ],
      [
        'name' => 'En proceso',
        'status' => true
      ],
      [
        'name' => 'En despacho',
        'status' => true
      ],
      [
        'name' => 'Entregado',
        'status' => true
      ]
    ]);
  }
}
