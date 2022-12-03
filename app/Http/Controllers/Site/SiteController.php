<?php
    namespace App\Http\Controllers\Site;

    use App\Http\Controllers\Controller;

    class SiteController extends Controller {
        public function home() {
            return view('site/home');
        }

        public function aboutus() {
            return view('site/about-us');
        }

        public function demovideos() {
            return view('site/demo-videos');
        }

        public function contactus() {
            return view('site/contact-us');
        }
    }
?>
