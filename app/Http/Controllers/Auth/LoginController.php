<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use App\Model\User;

use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    private $apiURL;

    public function __construct()
    {
        $this->apiURL = env('API_URL');
        $this->middleware('guest')->except('logout');
    }

    public function index()
    {
        return view('auth/login');
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email'    => 'required|email',
            'password' => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'  => false,
                'message' => $validator->errors()
            ], 400);
        }

        try {
            $token = auth()->attempt($validator->validated());

            if (!$token) {
                return response()->json([
                    'status'  => false,
                    'message' => 'Unauthorized'
                ], 401);
            }

            return response()->json([
                'status'       => true,
                'message'      => 'Login success',
                'access_token' => $token,
                'redirect'     => '/dashboard'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status'  => false,
                'message' => 'Login failed'
            ], 409);
        }
    }

    // public function login(Request $request)
    // {
    //     $request->validate([
    //         'email' => ['required', 'email'],
    //         'password' => ['required']
    //     ]);

    //     $credentials = $request->only('email', 'password');

    //     if (Auth::attempt($credentials)) {
    //         $user = User::where('email', $request->email)->first();

    //         if ($user->profile == 1) {
    //             return redirect('/dashboard');
    //         }
    //     }
    // }

    public function logout()
    {
        auth()->logout();

        return redirect()->route('login');
    }
}
