<?php

use Illuminate\Database\Seeder;

class ConfigSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    DB::table('configs')->insert([[
      'name' => 'ADDRESS',
      'value' => 'Uruguay 1753, San Ramón',
      'label' => 'Dirección',
    ], [
      'name' => 'PHONE',
      'value' => '(+562) 2904 6288',
      'label' => 'Teléfono',
    ], [
      'name' => 'SITE_NAME',
      'value' => 'Bravo Aceros',
      'label' => 'Nombre del sitio',
    ], [
      'name' => 'EMAIL',
      'value' => 'ventas@bravoaceros.cl',
      'label' => 'Email',
    ], [
      'name' => 'PHONE_HEADER',
      'value' => '(+562) 2526 5341 - (+562) 2904 6288 - (+569) 4230 3313',
      'label' => 'Telefono Header',
    ], [
      'name' => 'FOOTER_DESCRIPCION',
      'value' => 'Bravo Aceros nace en el año 2010 luego que su dueño decide independizarse posteriormente a trabajar 18 años en una importante distribuidora del mismo rubro.',
      'label' => 'Descripción Footer',
    ], [
      'name' => 'MIN_BUY',
      'value' => '30000',
      'label' => 'Minimo de compra',
    ], [
      'name' => 'MAX_BUY',
      'value' => '70000',
      'label' => 'Envío Gratis, si es 0 no hay envio Gratis',
    ]]);
  }
}
