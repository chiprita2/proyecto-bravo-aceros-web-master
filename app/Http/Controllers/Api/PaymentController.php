<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index () {
        $all = Payment::paginate(30);
        return response()->json($all, 200);
    }

    public function store (Request $request) {
        $input = $request->only(['name', 'status', 'description']);
        $item = Payment::create($input);
        return response()->json($item, 200);
    }

    public function show ($id) {
        $item = Payment::find($id);
        return response()->json($item, 200);
    }

    public function update (Request $request, $id) {
        $input = $request->only(['name', 'status', 'description']);
        $update = Payment::where('id', $id)->update($input);
        return response()->json($update, 200);
    }

    public function destroy ($id) {
        $item = Payment::find($id);
        $item->delete();
        return response()->json($item, 200);
    }
}
