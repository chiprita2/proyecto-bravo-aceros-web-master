<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function index (Request $request) {
        $all = Category::paginate(30);
        if (isset($request->actives)) {
            $all = Category::where('active', $request->actives)->get();
        }  
        return response()->json($all, 200);
    }

    public function store (Request $request) {
        $input = $request->only(['name','title', 'url', 'active', 'description', 'keywords']);
        $item = Category::create($input);
        return response()->json($item, 200);
    }

    public function show ($id) {
        $item = Category::find($id);
        return response()->json($item, 200);
    }

    public function update (Request $request, $id) {
        $input = $request->only(['name','title', 'url', 'active', 'description', 'keywords']);
        $update = Category::where('id', $id)->update($input);
        return response()->json($update, 200);
    }

    public function destroy ($id) {
        $item = Category::find($id);
        $item->delete();
        return response()->json($item, 200);
    }
}
