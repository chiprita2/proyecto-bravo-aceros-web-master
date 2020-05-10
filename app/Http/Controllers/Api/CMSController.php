<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Cms;

class CMSController extends Controller
{
     //Index llama a la ruta en GET
     public function index () {
        $all = Cms::paginate(30);
        return response()->json($all, 200);
    }

    //Store llama a la ruta en POST
    public function store (Request $request) {
        $input = $request->only(['name', 'description', 'url', 'active', 'title', 'seo_description', 'keywords']);
        $item = Cms::create($input);
        return response()->json($item, 200);
    }
    //Show llama a la ruta en GET
    public function show ($id) {
        $item = Cms::find($id);
        return response()->json($item, 200);
    }
    //Update llama a la ruta en PUT
    public function update (Request $request, $id) {
        $input = $request->only(['name', 'description', 'url', 'active', 'title', 'seo_description', 'keywords']);
        $update = Cms::where('id', $id)->update($input);
        return response()->json($update, 200);
    }
    //Destroy llama a la ruta en Delete
    public function destroy ($id) {
        $item = Cms::find($id);
        $item->delete();
        return response()->json($item, 200);
    }
}
