<?php

namespace App\Exports;

use App\Stock;
use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class StockExport implements FromView
{
    use Exportable;

    public function __construct(int $idStore, int $idProduct, String $dateStart, String $dateFinish)
    {
        $this->idStore = $idStore;
        $this->idProduct = $idProduct;
        $this->dateStart = $dateStart;
        $this->dateFinish = $dateFinish;
    }


    public function view(): View
    {
        $stocks = Stock::query()
            ->with(['store'])
            ->with(['product'])
            ->where('id_store', $this->idStore)
            ->where('id_product', $this->idProduct)
            ->whereBetween('created_at', [$this->dateStart, $this->dateFinish])
            ->orderBy('created_at', 'DESC')->get();
        $response = [];
        foreach ($stocks as $stock) {
            $response[] = [
                'id' => $stock->id,
                'store' => $stock->store->name,
                'product' => $stock->product->name,
                'saldo' => $stock->saldo,
                'created_at' => $stock->created_at
            ];
        }
        return view('exports.stock', [
            'items' => $response
        ]);
    }
}
