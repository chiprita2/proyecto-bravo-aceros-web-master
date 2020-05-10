<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin;

class AdminController extends Controller
{
  public function index()
  {
    $all = Admin::paginate(30);
    return response()->json($all, 200);
  }

  public function store(Request $request)
  {
    $admin = new Admin();
    $admin->name = $request->name;
    $admin->email = $request->email;
    $admin->rol = $request->rol;
    $admin->status = $request->status;
    $admin->password = bcrypt($request->password);
    $admin->save();
    return response()->json($admin, 200);
  }

  public function show($id)
  {
    $item = Admin::find($id);
    return response()->json($item, 200);
  }

  public function update(Request $request, $id)
  {
    $admin = Admin::find($id);
    $admin->name = $request->name;
    $admin->email = $request->email;
    $admin->rol = $request->rol;
    $admin->status = $request->status;
    if ($request->password !== '') {
      $admin->password = bcrypt($request->password);
    }
    $admin->save();
    return response()->json($admin, 200);
  }

  public function destroy($id)
  {
    $item = Admin::find($id);
    $item->delete();
    return response()->json($item, 200);
  }
}
