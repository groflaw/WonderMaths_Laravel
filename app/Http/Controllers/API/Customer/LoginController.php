<?php
    namespace App\Http\Controllers\API\Customer;

    use Twilio;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Validator;
    use App\Http\Controllers\Controller;
    use App\Models\ProductCode;
    use App\Models\User;

    class LoginController extends Controller {
        public function __construct() {
            $this->middleware('api');
        }

        public function login(Request $request) {
            $validator = Validator::make($request->all(), [
                'mobile_no' => 'required'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status'  => false,
                    'message' => $validator->errors()
                ], 400);
            }

            try {
                $user = User::where('mobile_no', $request->input('mobile_no'))
                    ->where('profile', 4)
                    ->first();

                if ($user != null) {
                    $productCode = null;

                    if ($user->product_code_id != null) {
                        $productCodeObj = ProductCode::find($user->product_code_id);
                        $productCode = $productCodeObj->product_code;
                    }

                    return response()->json([
                        'status'    => true,
                        'message'   => 'Login success',
                        'new_user'  => false,
                        'user_id'   => $user->id,
                        'prod_code' => $productCode
                    ], 200);
                } else {
                    $otp = rand(1000, 9999);
                    $mobileNo = $request->input('mobile_no');

                    $user             = new User;
                    $user->otp        = $otp;
                    $user->mobile_no  = $mobileNo;
                    $user->profile    = 4;
                    $user->save();

                    $this->sendOtpMsg($mobileNo, $otp);

                    return response()->json([
                        'status'    => true,
                        'message'   => 'Registration successfull',
                        'new_user'  => true,
                        'user_id'   => $user->id,
                        'prod_code' => null
                    ], 201);
                }
            } catch (\Exception $e) {
                return response()->json([
                    'status'  => false,
                    'message' => 'Failed to register'
                ], 409);
            }
        }

        /***********/
        /* PRIVATE */

        private function sendOtpMsg($mobileNo, $otp) {
            Twilio::message($mobileNo, 'Your OTP for Magic Maths Tree App is ' . $otp);
        }
    }
?>
