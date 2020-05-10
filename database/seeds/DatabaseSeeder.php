<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run()
  {
    $this->call([
      CmsSeeder::class,
      ProductionSeeder::class,
      ConfigSeeder::class,
      SeoSeeder::class,
      PaymentSeeder::class,
      OrderStatusSeeder::class,
      ZoneSeeder::class
    ]);
  }
}
