<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\StockExport;
use App\Stock;
use Maatwebsite\Excel\Facades\Excel;

class StockController extends Controller
{
  public function index()
  {
    $all = Stock::paginate(30);
    return response()->json($all, 200);
  }

  public function store(Request $request)
  {
    $input = $request->only(['saldo']);
    $item = Stock::create($input);
    return response()->json($item, 200);
  }

  public function show($id)
  {
    $item = Stock::find($id);
    return response()->json($item, 200);
  }

  public function update(Request $request, $id)
  {
    $input = $request->only(['saldo']);
    $update = Stock::where('id', $id)->update($input);
    return response()->json($update, 200);
  }

  public function destroy($id)
  {
    $item = Stock::find($id);
    $item->delete();
    return response()->json($item, 200);
  }
  public function export(Request $request)
  {
    $id_store = $request->idStore;
    $id_product = $request->idProduct;
    $from = $request->from;
    $end = $request->end;
    return Excel::download(new StockExport($id_store, $id_product, $from, $end), 'books.xlsx');
  }

  public function prueba()
  {
    $stocks = Stock::query()
      ->with(['store'])
      ->with(['product'])
      ->where('id_store', 1)
      ->where('id_product', 1)
      ->whereBetween('created_at', ['2020-04-20', '2020-04-24'])
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
    return response()->json($response, 200);
  }
}
