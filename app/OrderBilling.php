<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderBilling extends Model
{
    protected $table = 'order_billing';
    protected $fillable = [
        'razon_social',
        'rut',
        'direccion',
        'comuna',
        'ciudad',
        'region',
        'giro'
        ];

        public function order()
        {
            return $this->hasMany(Order::class, 'id_order_billing');
        }
}
