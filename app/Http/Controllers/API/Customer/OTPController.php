<?php
    namespace App\Http\Controllers\API\Customer;

    use Twilio;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Validator;
    use App\Http\Controllers\Controller;
    use App\Models\User;

    class OTPController extends Controller {
        public function __construct() {
            $this->middleware('api');
        }

        public function verifyotp(Request $request) {
            $validator = Validator::make($request->all(), [
                'user_id' => 'required|integer|exists:users,id',
                'otp'     => 'required|regex:/^\d{4}$/'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status'  => false,
                    'message' => $validator->errors()
                ], 400);
            }

            try {
                $user = User::find($request->input('user_id'));

                if ($user) {
                    if ($user->otp == $request->input('otp')) {
                        $user->otp         = NULL;
                        $user->status      = 1;
                        $user->is_verified = 1;
                        $user->save();

                        return response()->json([
                            'status'  => true,
                            'message' => 'OTP verification complete'
                        ], 200);
                    } else {
                        return response()->json([
                            'status'  => false,
                            'message' => 'Incorrect OTP'
                        ], 409);
                    }
                } else {
                    return response()->json([
                        'status'  => false,
                        'message' => 'OTP verification failed'
                    ], 409);
                }
            } catch (\Exception $e) {
                return response()->json([
                    'status'  => false,
                    'message' => 'OTP verification failed'
                ], 409);
            }
        }

        public function resendotp(Request $request) {
            $validator = Validator::make($request->all(), [
                'user_id' => 'required|integer|exists:users,id'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status'  => false,
                    'message' => $validator->errors()
                ], 400);
            }

            try {
                $user = User::find($request->input('user_id'));

                if ($user) {
                    $otp = rand(1000, 9999);

                    $user->otp = $otp;
                    $user->save();

                    $this->sendOtpMsg($user->mobile_no, $otp);

                    return response()->json([
                        'status'  => true,
                        'message' => 'Resend OTP successfully'
                    ], 200);
                } else {
                    return response()->json([
                        'status'  => false,
                        'message' => 'Failed to resend OTP'
                    ], 409);
                }
            } catch (\Exception $e) {
                return response()->json([
                    'status'  => false,
                    'message' => 'Failed to resend OTP'
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
