<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Provider;

class ProviderController extends Controller
{
  public function index(Request $request)
  {
    $all = Provider::paginate(30);
    if (isset($request->rut)) {
      $all = Provider::where('rut', 'like', "%{$request->rut}%")->get();
    }
    return response()->json($all, 200);
  }

  public function store(Request $request)
  {
    $input = $request->only(['name', 'rut', 'email', 'active']);
    $item = Provider::create($input);
    return response()->json($item, 200);
  }

  public function show($id)
  {
    $item = Provider::find($id);
    return response()->json($item, 200);
  }

  public function update(Request $request, $id)
  {
    $input = $request->only(['name', 'rut', 'email', 'active']);
    $update = Provider::where('id', $id)->update($input);
    return response()->json($update, 200);
  }

  public function destroy($id)
  {
    $item = Provider::find($id);
    $item->delete();
    return response()->json($item, 200);
  }
}
