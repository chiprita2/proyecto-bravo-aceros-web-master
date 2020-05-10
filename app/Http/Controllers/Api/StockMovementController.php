<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\StockMovement;
use App\Stock;
use App\Exports\StockMovementExport;
use Maatwebsite\Excel\Facades\Excel;

class StockMovementController extends Controller
{
  public function index(Request $request)
  {
    $id_store = $request->idStore;
    $id_product = $request->idProduct;
    $from = $request->from;
    $end = $request->end;
    $stock = Stock::where('id_store', $id_store)->where('id_product', $id_product)->first();
    // IDStock? IDtienda y ID_product
    $all = StockMovement::with(['provider'])->whereBetween('created_at', [$from, $end])->where('id_stock', $stock['id'])->orderBy('created_at', 'DESC')->paginate(50);
    $all->appends(request()->input())->links();
    return response()->json($all, 200);
  }

  public function export(Request $request)
  {
    $id_store = $request->idStore;
    $id_product = $request->idProduct;
    $from = $request->from;
    $end = $request->end;
    return Excel::download(new StockMovementExport($id_store, $id_product, $from, $end), 'books.xlsx');
  }
  public function prueba()
  {
    $stock = Stock::with(['store'])->where('id_store', 1)->where('id_product', 1)->first();
    $response = [];
    $StockMovements = StockMovement::query()
      ->with(['provider'])
      ->with(['order'])
      ->whereBetween('created_at', ['2020-04-22', '2020-04-24'])
      ->where('id_stock', $stock['id'])
      ->orderBy('created_at', 'DESC')->get();
    foreach ($StockMovements as $StockMovement) {
      $response[] = [
        'id' => $StockMovement->id,
        'store' => $stock->store->name,
        'provider' => $StockMovement->provider->name,
        'order' => $StockMovement->order->name,
        'description' => $StockMovement->description,
        'value' => $StockMovement->value,
        'saldo' => $StockMovement->saldo,
        'created_at' => $StockMovement->created_at,
        'updated_at' => $StockMovement->updated_at
      ];
    }
    return response()->json($response, 200);
  }

  public function store(Request $request)
  {
    $store = $request['store'];
    $provider = $request['provider'];
    $products = $request['products'];
    $description = $request['description'];
    foreach ($products as $product) {
      $stock = Stock::where('id_store', $store)->where('id_product', $product['product']['id'])->first();
      if (!$stock) {
        $stock = new Stock;
        $stock->id_store = $store;
        $stock->id_product = $product['product']['id'];
        $stock->saldo = 0;
        $stock->save();
      }
      $stockM = new StockMovement;
      $stockM->id_stock = $stock['id'];
      $stockM->id_provider = $provider;
      $stockM->description = $description;
      $stockM->value = $product['quantity'];
      $stockM->save();

      $stock->saldo = $stock->saldo + $product['quantity'];
      $stock->save();
    }

    return response()->json($stockM, 200);
  }

  public function show($id)
  {
    $item = StockMovement::find($id);
    return response()->json($item, 200);
  }

  public function update(Request $request, $id)
  {
    $input = $request->only(['description', 'value']);
    $update = StockMovement::where('id', $id)->update($input);
    return response()->json($update, 200);
  }

  public function destroy($id)
  {
    $item = StockMovement::find($id);
    $item->delete();
    return response()->json($item, 200);
  }
}
