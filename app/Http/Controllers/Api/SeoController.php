<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Seo;

class SeoController extends Controller
{
    public function index () {
        $all = Seo::paginate(30);
        return response()->json($all, 200);
    }

    public function store (Request $request) {
        $input = $request->only(['url', 'title', 'description', 'keywords']);
        $seo = Seo::create($input);
        return response()->json($seo, 200);
    }

    public function show ($id) {
        $seo = Seo::find($id);
        return response()->json($seo, 200);
    }

    public function update (Request $request, $id) {
        $input = $request->only(['url', 'title', 'description', 'keywords']);
        $update = Seo::where('id', $id)->update($input);
        return response()->json($update, 200);
    }

    public function destroy ($id) {
        $seo = Seo::find($id);
        $seo->delete();
        return response()->json($seo, 200);
    }
}
