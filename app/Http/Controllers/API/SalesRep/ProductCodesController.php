<?php
    namespace App\Http\Controllers\API\SalesRep;

    use App\Http\Controllers\Controller;
    use App\Models\ProductCode;

    class ProductCodesController extends Controller {
        public function __construct() {
            // $this->middleware('auth:api');
        }

        public function index($id, $status) {
            $productCodes = ProductCode::select('id','product_code as code')
                ->where('sales_rep', $id)
                ->where('status', $status)
                ->orderBy('created_at', 'desc')
                ->get();
            return response()->json($productCodes);
        }
    }
?>
