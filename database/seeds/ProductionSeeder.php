<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductionSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {

    DB::table('categories')->insert([
      'name' => 'Perfil Cerrado',
      'title' => 'Perfil Cerrado',
      'url' => 'perfil-cerrado',
      'active' => 1,
      'description' => '',
      'keywords' => ''
    ]);
    DB::table('categories')->insert([
      'name' => 'Perfil Abierto',
      'title' => 'Perfil Abierto',
      'url' => 'perfil-abierto',
      'active' => 1,
      'description' => '',
      'keywords' => ''
    ]);
    DB::table('categories')->insert([
      'name' => 'Perfil Laminado',
      'title' => 'Perfil Laminado',
      'url' => 'perfil-laminado',
      'active' => 1,
      'description' => '',
      'keywords' => ''
    ]);
    DB::table('categories')->insert([
      'name' => 'Perfil Galvanizado',
      'title' => 'Perfil Galvanizado',
      'url' => 'perfil-galvanizado',
      'active' => 1,
      'description' => '',
      'keywords' => ''
    ]);
    DB::table('categories')->insert([
      'name' => 'Planchas',
      'title' => 'Planchas',
      'url' => 'planchas',
      'active' => 1,
      'description' => '',
      'keywords' => ''
    ]);
    DB::table('categories')->insert([
      'name' => 'Cañerias',
      'title' => 'Cañerias',
      'url' => 'canerias',
      'active' => 1,
      'description' => '',
      'keywords' => ''
    ]);
    DB::table('categories')->insert([
      'name' => 'Fierro Construcción',
      'title' => 'Fierro Construcción',
      'url' => 'fierro-construccion',
      'active' => 1,
      'description' => '',
      'keywords' => ''
    ]);
    DB::table('products_main')->insert([
      'name' => 'Tubos',
      'title' => 'Tubos',
      'url' => 'tubos',
      'description' => 'Tubos',
      'description_short' => 'Los perfiles cerrados del tipo tubo son comercializados por Bravo Aceros, y fabricados por nuestros proveedores con acero estructural de la mejor calidad.',
      'seo_description' => 'Los perfiles cerrados del tipo tubo son comercializados por Bravo Aceros, y fabricados por nuestros proveedores con acero estructural de la mejor calidad.',
      'active' => 1,
      'keywords' => ''
    ]);
    DB::table('products_main_categories')->insert([
      'product_main_id' => 1,
      'category_id' => 1
    ]);
    DB::table('products')->insert([
      [
        'product_main_id' => 1,
        'sku' => '2070010',
        'name' => 'TUBO 1/2 X 1',
        'price' => '680',
        'active' => 1
      ],
      [
        'product_main_id' => 1,
        'sku' => '2070020',
        'name' => 'TUBO 5/8 X 1',
        'price' => '680',
        'active' => 1
      ],
      [
        'product_main_id' => 1,
        'sku' => '2070030',
        'name' => 'TUBO 5/8 X 1,5',
        'price' => '700',
        'active' => 1
      ],
      [
        'product_main_id' => 1,
        'sku' => '2070040',
        'name' => 'TUBO 5/8 X 2',
        'price' => '700',
        'active' => 1
      ],
      [
        'product_main_id' => 1,
        'sku' => '2070050',
        'name' => 'TUBO 3/4 X 1',
        'price' => '700',
        'active' => 1
      ],
      [
        'product_main_id' => 1,
        'sku' => '2070060',
        'name' => 'TUBO 3/4 X 1,5',
        'price' => '700',
        'active' => 1
      ],
      [
        'product_main_id' => 1,
        'sku' => '2070070',
        'name' => 'TUBO 3/4 X 2',
        'price' => '700',
        'active' => 1
      ],
      [
        'product_main_id' => 1,
        'sku' => '2070080',
        'name' => 'TUBO 7/8 X 1',
        'price' => '700',
        'active' => 1
      ],
      [
        'product_main_id' => 1,
        'sku' => '2070090',
        'name' => 'TUBO 7/8 X 1,5',
        'price' => '700',
        'active' => 1
      ],
      [
        'product_main_id' => 1,
        'sku' => '2070100',
        'name' => 'TUBO 7/8 X 2',
        'price' => '700',
        'active' => 1
      ],
      [
        'product_main_id' => 1,
        'sku' => '2070110',
        'name' => 'TUBO 1 X 1',
        'price' => '700',
        'active' => 1
      ],
      [
        'product_main_id' => 1,
        'sku' => '2070120',
        'name' => 'TUBO 1 X 1,5',
        'price' => '700',
        'active' => 1
      ],
      [
        'product_main_id' => 1,
        'sku' => '2070130',
        'name' => 'TUBO 1 X 2',
        'price' => '700',
        'active' => 1
      ],
      [
        'product_main_id' => 1,
        'sku' => '2070140',
        'name' => 'TUBO 1 1/4 X 1',
        'price' => '700',
        'active' => 1
      ],
      [
        'product_main_id' => 1,
        'sku' => '2070150',
        'name' => 'TUBO 1 1/4 X 1,5',
        'price' => '700',
        'active' => 1
      ],
      [
        'product_main_id' => 1,
        'sku' => '2070160',
        'name' => 'TUBO 1 1 /4 X 2',
        'price' => '700',
        'active' => 1
      ],
      [
        'product_main_id' => 1,
        'sku' => '2070170',
        'name' => 'TUBO 1 1/2 X 1',
        'price' => '700',
        'active' => 1
      ],
      [
        'product_main_id' => 1,
        'sku' => '2070180',
        'name' => 'TUBO 1 1 /2 X 1,5',
        'price' => '700',
        'active' => 1
      ],
      [
        'product_main_id' => 1,
        'sku' => '2070190',
        'name' => 'TUBO 1 1/2 X 2',
        'price' => '700',
        'active' => 1
      ],
      [
        'product_main_id' => 1,
        'sku' => '2070200',
        'name' => 'TUBO 1 3/4 X 1',
        'price' => '700',
        'active' => 1
      ],
      [
        'product_main_id' => 1,
        'sku' => '2070210',
        'name' => 'TUBO 1 3/4 X 1,5',
        'price' => '700',
        'active' => 1
      ],
      [
        'product_main_id' => 1,
        'sku' => '2070220',
        'name' => 'TUBO 1 3/4 X 2',
        'price' => '700',
        'active' => 1
      ],
      [
        'product_main_id' => 1,
        'sku' => '2070230',
        'name' => 'TUBO 2 X 1',
        'price' => '700',
        'active' => 1
      ],
      [
        'product_main_id' => 1,
        'sku' => '2070240',
        'name' => 'TUBO 2 X 1,5',
        'price' => '700',
        'active' => 1
      ],
      [
        'product_main_id' => 1,
        'sku' => '2070250',
        'name' => 'TUBO 2 X 2',
        'price' => '700',
        'active' => 1
      ],
      [
        'product_main_id' => 1,
        'sku' => '2070260',
        'name' => 'TUBO 2 X 3',
        'price' => '700',
        'active' => 1
      ],
      [
        'product_main_id' => 1,
        'sku' => '2070270',
        'name' => 'TUBO 2 1/2 X 1,5',
        'price' => '700',
        'active' => 1
      ],
      [
        'product_main_id' => 1,
        'sku' => '2070280',
        'name' => 'TUBO 2 1/2  X 2',
        'price' => '700',
        'active' => 1
      ],
      [
        'product_main_id' => 1,
        'sku' => '2070290',
        'name' => 'TUBO 2 1/2 X 3 ',
        'price' => '700',
        'active' => 1
      ],
      [
        'product_main_id' => 1,
        'sku' => '2070300',
        'name' => 'TUBO 3 X 1,5',
        'price' => '700',
        'active' => 1
      ],
      [
        'product_main_id' => 1,
        'sku' => '2070310',
        'name' => 'TUBO 3 X 2',
        'price' => '700',
        'active' => 1
      ],
      [
        'product_main_id' => 1,
        'sku' => '2070320',
        'name' => 'TUBO 3 X 3',
        'price' => '700',
        'active' => 1
      ],
      [
        'product_main_id' => 1,
        'sku' => '2070330',
        'name' => 'TUBO 3 X 4',
        'price' => '700',
        'active' => 1
      ],
      [
        'product_main_id' => 1,
        'sku' => '2070340',
        'name' => 'TUBO 3 1/2 X 2',
        'price' => '700',
        'active' => 1
      ],
      [
        'product_main_id' => 1,
        'sku' => '2070350',
        'name' => 'TUBO 4 X 2',
        'price' => '700',
        'active' => 1
      ],
      [
        'product_main_id' => 1,
        'sku' => '2070360',
        'name' => 'TUBO 4 X 3',
        'price' => '700',
        'active' => 1
      ],
      [
        'product_main_id' => 1,
        'sku' => '2070370',
        'name' => 'TUBO 4 X 4',
        'price' => '700',
        'active' => 1
      ],
      [
        'product_main_id' => 1,
        'sku' => '2070380',
        'name' => 'TUBO 4 X 5',
        'price' => '700',
        'active' => 1
      ],
      [
        'product_main_id' => 1,
        'sku' => '2070390',
        'name' => 'TUBO 5 X 3',
        'price' => '700',
        'active' => 1
      ],
      [
        'product_main_id' => 1,
        'sku' => '2070400',
        'name' => 'TUBO 5 X 4',
        'price' => '700',
        'active' => 1
      ],
      [
        'product_main_id' => 1,
        'sku' => '2070410',
        'name' => 'TUBO 5 X 5',
        'price' => '700',
        'active' => 1
      ]
    ]);
  }
}
