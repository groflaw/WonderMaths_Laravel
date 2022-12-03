<?php
    namespace App\Http\Controllers;

    use Redirect;

    class HomeController extends Controller {
        public function redirect() {
            return Redirect::route('login');
        }
    }
?>
