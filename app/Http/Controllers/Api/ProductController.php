<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\PricesImport;

class ProductController extends Controller
{
  public function index(Request $request)
  {
    $all = Product::paginate(30);
    if (isset($request->search)) {
      $all = Product::where('name', 'like', "%$request->search%")
        ->orWhere('sku', 'like', "%$request->search%")
        ->paginate(30);
    }
    return response()->json($all, 200);
  }

  public function store(Request $request)
  {
    $input = $request->only(['product_main_id', 'sku', 'name', 'active', 'price', 'sale', 'price_sale']);
    $item = Product::create($input);
    return response()->json($item, 200);
  }

  public function show($id)
  {
    $item = Product::with('features')->find($id);
    return response()->json($item, 200);
  }

  public function update(Request $request, $id)
  {
    $input = $request->only(['product_main_id', 'sku', 'name', 'active', 'price', 'sale', 'price_sale']);
    $update = Product::where('id', $id)->update($input);
    return response()->json($update, 200);
  }

  public function destroy($id)
  {
    $item = Product::find($id);
    $item->delete();
    return response()->json($item, 200);
  }

  public function addFeature(Request $request, $id)
  {
    $product = Product::find($id);
    $product->features()->syncWithoutDetaching([$request->feature => ['value' => $request->value]]);
    return response()->json($product, 200);
  }

  public function updateFeature(Request $request, $id)
  {
    $product = Product::find($id);
    $features = $request->features;
    $inserts = [];
    foreach ($features as $feature) {
      $inserts[$feature['id']] =  ['value' => $feature['value']];
    }
    $product->features()->syncWithoutDetaching($inserts);
    return response()->json($inserts, 200);
  }


  public function searchInsertStock($search)
  {
    $p = Product::where('name', 'like', "%$search%")
      ->orWhere('sku', 'like', "%$search%")
      ->where('active', 1)
      ->get();
    return response()->json($p, 200);
  }


  public function menu()
  {
    $products = Product::all();

    return view('import\price')->with('products', $products);
  }

  public function import(Request $request)
  {
    if ($request->file('imported_file')) {
      Excel::import(new PricesImport(), request()->file('imported_file'));
      return back();
    }
  }
}
