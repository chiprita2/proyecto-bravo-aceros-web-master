<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {

    for ($i = 1; $i <= 20; $i++) {
      DB::table('categories')->insert([
        'name' => 'Categoria => ' . $i,
        'title' => 'Categoria => ' . $i,
        'url' => 'categoria-' . $i,
        'active' => '1',
        'description' => Str::random(30),
        'keywords' => Str::random(30)
      ]);
      DB::table('products_main')->insert([
        'name' => 'Product => ' . $i,
        'title' => 'Product => ' . $i,
        'url' => 'product-' . $i,
        'description' => Str::random(30),
        'description_short' => Str::random(150),
        'seo_description' => Str::random(30),
        'active' => '1',
        'keywords' => Str::random(30)
      ]);
    }

    for ($j = 1; $j <= 20; $j++) {
      for ($i = 1; $i <= 20; $i++) {
        DB::table('products_main_categories')->insert([
          'product_main_id' => $j,
          'category_id' => $i
        ]);
      }
    }

    for ($i = 1; $i <= 20; $i++) {
      DB::table('products')->insert([
        'product_main_id' => $i,
        'sku' => 4000 + $i,
        'name' => Str::random(10),
        'active' => 1,
        'price' => 1000 + $i
      ]);
    }
  }
}
