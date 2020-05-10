<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Config;


class ConfigController extends Controller
{
  //Index llama a la ruta en GET
  public function index()
  {
    $all = Config::all();
    return response()->json($all, 200);
  }

  //Store llama a la ruta en POST
  public function store(Request $request)
  {
    $items = $request->items;
    foreach ($items as $item) {
      Config::where('name', $item['name'])->update([
        'value' => $item['value']
      ]);
    }
    return response()->json($items, 200);
  }
  //Show llama a la ruta en GET
  public function show($id)
  {
    $item = Config::find($id);
    return response()->json($item, 200);
  }

  //Destroy llama a la ruta en Delete
  public function destroy($id)
  {
    $item = Config::find($id);
    $item->delete();
    return response()->json($item, 200);
  }
}
