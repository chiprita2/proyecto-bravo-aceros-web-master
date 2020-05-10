<?php

use Illuminate\Database\Seeder;

class ZoneSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    DB::table('zones')->insert([
      [
        'name' => 'Las condes',
        'status' => true,
        'price' => 20000
      ],
      [
        'name' => 'Providencia',
        'status' => true,
        'price' => 40000
      ],
      [
        'name' => 'Ñuñoa',
        'status' => true,
        'price' => 60000
      ],
      [
        'name' => 'Vitacura',
        'status' => true,
        'price' => 80000
      ],
      [
        'name' => 'Quilicura',
        'status' => false,
        'price' => 0
      ]
    ]);
  }
}
