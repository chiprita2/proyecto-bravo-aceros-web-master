<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\OrderStatus;
use Illuminate\Http\Request;

class OrderStatusController extends Controller
{
  public function index(Request $req)
  {
    $all = OrderStatus::paginate(30);
    if ($req->all) {
      $all = OrderStatus::where('status', 1)->get();
    }
    return response()->json($all, 200);
  }

  public function store(Request $request)
  {
    $input = $request->only(['name', 'status']);
    $item = OrderStatus::create($input);
    return response()->json($item, 200);
  }

  public function show($id)
  {
    $item = OrderStatus::find($id);
    return response()->json($item, 200);
  }

  public function update(Request $request, $id)
  {
    $input = $request->only(['name', 'status']);
    $update = OrderStatus::where('id', $id)->update($input);
    return response()->json($update, 200);
  }

  public function destroy($id)
  {
    $item = OrderStatus::find($id);
    $item->delete();
    return response()->json($item, 200);
  }
}
