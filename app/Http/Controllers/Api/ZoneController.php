<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Zone;
use Illuminate\Http\Request;

class ZoneController extends Controller
{
    public function index () {
        $all = Zone::paginate(30);
        return response()->json($all, 200);
    }

    public function store (Request $request) {
        $input = $request->only(['name', 'status', 'price']);
        $item = Zone::create($input);
        return response()->json($item, 200);
    }

    public function show ($id) {
        $item = Zone::find($id);
        return response()->json($item, 200);
    }

    public function update (Request $request, $id) {
        $input = $request->only(['name', 'status', 'price']);
        $update = Zone::where('id', $id)->update($input);
        return response()->json($update, 200);
    }

    public function destroy ($id) {
        $item = Zone::find($id);
        $item->delete();
        return response()->json($item, 200);
    }
}
