<?php

namespace App\Exports;

use App\StockMovement;
use App\Stock;
use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class StockMovementExport implements FromView
{

  use Exportable;

  public function __construct(int $idProduct, int $idStore, String $dateStart, String $dateFinish)
  {

    $this->idProduct = $idProduct;
    $this->idStore = $idStore;
    $this->dateStart = $dateStart;
    $this->dateFinish = $dateFinish;
  }


  public function view(): View
  {
    $stock = Stock::with(['store'])->where('id_store', $this->idStore)->where('id_product', $this->idProduct)->first();
    $response = [];
    $StockMovements = StockMovement::query()
      ->with(['provider'])
      ->with(['order'])
      ->whereBetween('created_at', [$this->dateStart, $this->dateFinish])
      ->where('id_stock', $stock['id'])
      ->orderBy('created_at', 'DESC')->get();
    foreach ($StockMovements as $StockMovement) {
      $response[] = [
        'id' => $StockMovement->id,
        'store' => $stock->store->name,
        'provider' => $StockMovement->provider->name,
        'order' => ($StockMovement->order) ? $StockMovement->order->id : 0,
        'description' => $StockMovement->description,
        'value' => $StockMovement->value,
        'saldo' => $StockMovement->saldo,
        'created_at' => $StockMovement->created_at,
        'updated_at' => $StockMovement->updated_at
      ];
    }
    return view('exports.stockMovement', [
      'items' => $response
    ]);
  }
}
