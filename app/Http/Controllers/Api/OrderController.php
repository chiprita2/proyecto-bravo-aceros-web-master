<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Http\Request;
use Carbon\Carbon;

class OrderController extends Controller
{
  public function index(Request $req)
  {
    $all = Order::paginate(30);
    if ($req->status && $req->fecha) {
      $date = Carbon::parse($req->fecha, 'UTC');
      $all = Order::with(['zone'])
        ->where('id_order_status', $req->status)
        ->whereDate('created_at', $date->isoFormat('YYYY-MM-DD'))
        ->paginate(50);
    }
    return response()->json($all, 200);
  }

  public function store(Request $request)
  {
    $input = $request->only([
      'method',
      'shipping_name',
      'shipping_address',
      'info_optional',
      'name',
      'email',
      'billing',
      'phone',
      'total_pay',
      'total_shipping',
      'total_discount',
      'code_uniq',
      'pay',
      'latitude',
      'longitude'
    ]);
    $item = Order::create($input);
    return response()->json($item, 200);
  }

  public function show($id)
  {
    $item = Order::find($id);
    return response()->json($item, 200);
  }

  public function update(Request $request, $id)
  {
    $input = $request->only([
      'method',
      'shipping_name',
      'shipping_address',
      'info_optional',
      'name',
      'email',
      'billing',
      'phone',
      'total_pay',
      'total_shipping',
      'total_discount',
      'code_uniq',
      'pay',
      'latitude',
      'longitude'
    ]);
    $update = Order::where('id', $id)->update($input);
    return response()->json($update, 200);
  }

  public function destroy($id)
  {
    $item = Order::find($id);
    $item->delete();
    return response()->json($item, 200);
  }
}
