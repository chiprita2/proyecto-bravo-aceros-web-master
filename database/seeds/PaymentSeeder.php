<?php

use Illuminate\Database\Seeder;

class PaymentSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    DB::table('payments')->insert([
      'name' => 'Transferencia',
      'status' => true,
      'description' => 'Cuando termine el pedido se entregara los datos bancarios para hacer el deposito u/o transferencia'
    ]);
  }
}
