<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\OrderBilling;
use Illuminate\Http\Request;

class OrderBillingController extends Controller
{
    public function index () {
        $all = OrderBilling::paginate(30);
        return response()->json($all, 200);
    }

    public function store (Request $request) {
        $input = $request->only([
        'razon_social',
        'rut',
        'direccion',
        'comuna',
        'ciudad',
        'region',
        'giro'
        ]);
        $item = OrderBilling::create($input);
        return response()->json($item, 200);
    }

    public function show ($id) {
        $item = OrderBilling::find($id);
        return response()->json($item, 200);
    }

    public function update (Request $request, $id) {
        $input = $request->only([
        'razon_social',
        'rut',
        'direccion',
        'comuna',
        'ciudad',
        'region',
        'giro'
        ]);
        $update = OrderBilling::where('id', $id)->update($input);
        return response()->json($update, 200);
    }

    public function destroy ($id) {
        $item = OrderBilling::find($id);
        $item->delete();
        return response()->json($item, 200);
    }
}
