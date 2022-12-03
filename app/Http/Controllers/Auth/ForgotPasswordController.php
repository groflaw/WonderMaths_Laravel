<?php
    namespace App\Http\Controllers\Auth;

    use App\Http\Controllers\Controller;

    class ForgotPasswordController extends Controller {
        public function __construct() {
            $this->middleware('web')->except('forgotpassword');
        }

        public function index() {
            return view('auth/forgotpassword');
        }

        public function forgotpassword() {
            return redirect()->route('login');
        }
    }
?>
