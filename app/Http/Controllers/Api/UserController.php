<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Freshwork\ChileanBundle\Rut;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
    public function index()
    {
        $all = User::paginate(30);
        return response()->json($all, 200);
    }

    public function store(Request $request)
    {
        $user = new User();
        $rutVerified = Rut::parse($request->rut)->format();
        if (Rut::parse($rutVerified)->isValid()) {
            $user->rut = Rut::parse($rutVerified)->number();
            $user->phone = $request->phone;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->save();
            return response()->json($user, 200);
        }
    }

    public function show($id)
    {
        $item = User::find($id);
        return response()->json($item, 200);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $validator = Validator::make(
            $request->all(),
            [
                'rut' => ($request->rut)? 'required|cl_rut|unique:users' : '',
                'email' => ($request->email !== $user->email) ? 'required|email:rfc,dns|unique:users' : '',
            ],
            [
                'rut.cl_rut' => 'Rut no valido',
                'rut.required' => 'Rut es requerido',
                'email.required' => 'El email es obligatorio',
                'email.email' => 'Debe tener format email'
            ]
        );
        if ($validator->fails()) {
            return response()->json($validator, 200);
        }

        $rutVerified = Rut::parse($request->rut)->format();
        $user->rut = Rut::parse($rutVerified)->number();
        $user->phone = $request->phone;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        return response()->json($user, 200);
    }

    public function destroy($id)
    {
        $item = User::find($id);
        $item->delete();
        return response()->json($item, 200);
    }
}
