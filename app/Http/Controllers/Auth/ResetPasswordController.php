<?php
    namespace App\Http\Controllers\Auth;

    use App\Http\Controllers\Controller;

    class ResetPasswordController extends Controller {
        public function __construct() {
            $this->middleware('web')->except('resetpassword');
        }

        public function index() {
            return view('auth/resetpassword');
        }

        public function resetpassword() {
            return redirect()->route('login');
        }
    }
?>
