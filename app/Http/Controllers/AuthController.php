<?php

namespace  App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use App\Admin;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthController extends Controller
{
    public $loginAfterSignUp = true;

    public function __construct()
    {
        // $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    public function register(Request $request)
    {
        $user = new Admin();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        if ($this->loginAfterSignUp) {
            return $this->login($request);
        }

        return response()->json([
            'status' => 'ok',
            'data' => $user
        ], 200);
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (!$jwt_token = Auth::guard('api')->attempt($credentials)) {
            return response()->json([
                'status' => 'invalid_credentials',
                'message' => 'Correo o contraseña no válidos.',
            ], 401);
        }

        return response()->json($this->respondWithToken($jwt_token));
    }

    public function logout(Request $request)
    {
        $this->validate($request, [
            'token' => 'required'
        ]);

        try {
            Auth::guard('api')->invalidate($request->token);
            return  response()->json([
                'status' => 'ok',
                'message' => 'Cierre de sesión exitoso.'
            ]);
        } catch (JWTException  $exception) {
            return  response()->json([
                'status' => 'unknown_error',
                'message' => 'Al usuario no se le pudo cerrar la sesión.'
            ], 500);
        }
    }

    public function user() {
        $user = Auth::guard('api')->user();
        return response()->json($user);
    }
    
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => Auth::guard('api')->factory()->getTTL() * 60
        ]);
    }
}
