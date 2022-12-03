<?php
    namespace App\Http\Controllers\Admin;

    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Validator;

    use App\Http\Controllers\Controller;
    use App\Models\User;
    use App\Models\ProductCode;

    class CustomerController extends Controller {
        public function __construct() {
            $this->middleware('web');
        }

        public function load() {
            $productCodes = ProductCode::select('id','product_code')
                ->where('status', 1)
                ->orderBy('product_code', 'asc')
                ->get();
            return view('admin/customers', [ 'productCodes' => $productCodes ]);
        }

        public function index() {
            $customers = User::where('profile', 4)->orderBy('created_at', 'desc')->get();

            foreach ($customers as $customer) {
                $productCode = ProductCode::find($customer->product_code_id);
                $customer->product_code = $productCode->product_code;
            }

            return response()->json([ 'customers' => $customers ], 200);
        }

        public function update(Request $request) {
            $validator = Validator::make($request->all(), [
                'id'           => 'required|integer|exists:users',
                'product_code' => 'required|integer|exists:product_codes,id'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status'  => false,
                    'message' => $validator->errors()
                ], 200);
            }

            try {
                $customer                  = User::find($request->input('id'));
                $customer->product_code_id = $request->input('product_code');
                $customer->save();

                return response()->json([
                    'status'  => true,
                    'message' => 'Updated Customer'
                ], 200);
            } catch (\Exception $e) {
                return response()->json([
                    'status'  => false,
                    'message' => 'Failed to update Customer'
                ], 409);
            }
        }
    }
?>
