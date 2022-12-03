<?php
    namespace App\Http\Controllers\API;

    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Validator;

    use App\Http\Controllers\Controller;
    use App\Models\User;

    class AuthController extends Controller {
        public function __construct() {
            $this->middleware('auth:api')->except('login');
        }

        public function login(Request $request) {
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

                $user = User::select('id', 'name', 'mobile_no')->where('email', $request->input('email'))->first();

                return response()->json([
                    'status'       => true,
                    'message'      => 'Login success',
                    'user_id'      => $user->id,
                    'name'         => $user->name,
                    'mobile_no'    => $user->mobile_no,
                    'access_token' => $token
                ], 200);
            } catch (\Exception $e) {
                return response()->json([
                    'status'  => false,
                    'message' => 'Login failed'
                ], 409);
            }
        }

        public function logout() {
            try {
                auth()->logout();

                return response()->json([
                    'status'  => true,
                    'message' => 'Logout successfull'
                ], 200);
            } catch (\Exception $e) {
                return response()->json([
                    'status'  => false,
                    'message' => 'Logout failed'
                ], 409);
            }
        }

        public function refresh() {
            return response()->json([
                'access_token' => auth()->refresh()
            ]);
        }
    }
?>
