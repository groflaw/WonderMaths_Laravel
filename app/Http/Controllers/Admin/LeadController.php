<?php
    namespace App\Http\Controllers\Admin;

    use App\Http\Controllers\Controller;
    use App\Models\Lead;

    class LeadController extends Controller {
        public function __construct() {
            $this->middleware('web');
        }

        public function load() {
            return view('admin/leads');
        }

        public function index() {
            $leads = Lead::orderBy('created_at', 'desc')->get();
            return response()->json([ 'leads' => $leads ], 200);
        }
    }
?>
