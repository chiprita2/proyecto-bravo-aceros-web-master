<?php

namespace App\Imports;

use App\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Validation\Rule;


class PricesImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {

        if (Product::where('sku', '=', $row['sku'])->exists()) {
            $product = Product::where('sku', $row['sku'])->first();
            $product->price = $row['price'];
            $product->save();
        }
    }
}
