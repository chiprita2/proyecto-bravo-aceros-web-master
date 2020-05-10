<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Store;

class StoreController extends Controller
{
  public function index(Request $request)
  {
    $all = Store::paginate(30);
    if (isset($request->actives)) {
      $all = Store::where('active', $request->actives)->get();
    }
    return response()->json($all, 200);
  }

  public function store(Request $request)
  {
    $input = $request->only(['name', 'active']);
    $item = Store::create($input);
    return response()->json($item, 200);
  }

  public function show($id)
  {
    $item = Store::find($id);
    return response()->json($item, 200);
  }

  public function update(Request $request, $id)
  {
    $input = $request->only(['name', 'active']);
    $update = Store::where('id', $id)->update($input);
    return response()->json($update, 200);
  }

  public function destroy($id)
  {
    $item = Store::find($id);
    $item->delete();
    return response()->json($item, 200);
  }
}
