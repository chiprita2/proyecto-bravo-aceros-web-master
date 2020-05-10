<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ProductMain;
use App\ProductImage;
use Illuminate\Support\Facades\Storage;

class ProductMainController extends Controller
{
  public function index(Request $request)
  {
    $all = ProductMain::paginate(30);
    if (isset($request->actives)) {
      $all = ProductMain::where('active', $request->actives)->get();
    }
    return response()->json($all, 200);
  }

  public function store(Request $request)
  {
    $input = $request->only(['name', 'title', 'url', 'description', 'description_short', 'seo_description', 'active', 'keywords']);
    $item = ProductMain::create($input);
    return response()->json($item, 200);
  }

  public function show($id)
  {
    $item = ProductMain::with(['images', 'categories'])->find($id);
    return response()->json($item, 200);
  }

  public function update(Request $request, $id)
  {
    $input = $request->only(['name', 'title', 'url', 'description', 'description_short', 'seo_description', 'active', 'keywords']);
    $update = ProductMain::where('id', $id)->update($input);
    return response()->json($update, 200);
  }

  public function addCategories(Request $request, $id)
  {
    $categories = $request->categories;
    $category = ProductMain::find($id);
    $category->categories()->sync($categories);
    return response()->json($category, 200);
  }

  public function destroy($id)
  {
    $item = ProductMain::find($id);
    $item->delete();
    return response()->json($item, 200);
  }

  public function addImage(Request $request, $id)
  {
    $category = ProductMain::find($id);
    $request->validate([
      'photo'  => 'required|mimes:jpg,jpeg,png|max:20048',
    ]);
    if ($files = $request->file('photo')) {
      $destinationPath = 'product'; // upload path
      $productPhoto = date('YmdHis') . "." . $files->getClientOriginalExtension();
      Storage::disk('public')->putFileAs($destinationPath, $files, $productPhoto);
      $image = new ProductImage([
        'photo' => $productPhoto
      ]);
      $category->images()->save($image);
      return response()->json($productPhoto, 200);
    }
  }

  public function deleteImage($id)
  {
    $item = ProductImage::find($id);
    Storage::delete($item->image);
    $item->delete();
    return response()->json($item, 200);
  }
}
