<?php
    namespace App\Http\Controllers\API\Customer;

    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Validator;

    use App\Http\Controllers\Controller;
    use App\Models\User;

    class RegisterController extends Controller {
        public function __construct() {
            $this->middleware('api');
        }

        public function register(Request $request) {
            $validator = Validator::make($request->all(), [
                'name'      => 'required|string|max:30',
                'mobile_no' => 'required|digits:10|unique:users',
                'email'     => 'required|email|max:50|unique:users',
                'password'  => 'required|string|confirmed|min:8|max:12'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status'  => false,
                    'message' => $validator->errors()
                ], 400);
            }

            try {
                $user            = new User;
                $user->profile   = 4;
                $user->name      = $request->input('name');
                $user->mobile_no = $request->input('mobile_no');
                $user->email     = $request->input('email');
                $user->password  = app('hash')->make($request->input('password'));
                $user->save();

                return response()->json([
                    'status'  => true,
                    'message' => 'Registration successfull'
                ], 201);
            } catch (\Exception $e) {
                return response()->json([
                    'status'  => false,
                    'message' => 'Failed to register'
                ], 409);
            }
        }
    }
?>
