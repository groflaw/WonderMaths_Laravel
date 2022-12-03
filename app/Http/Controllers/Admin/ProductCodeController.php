<?php
    namespace App\Http\Controllers\Admin;

    use Illuminate\Http\Request;
    use Illuminate\Support\Str;
    use Illuminate\Support\Facades\Validator;

    use App\Http\Controllers\Controller;
    use App\Models\ProductCode;
    use App\Models\User;

    class ProductCodeController extends Controller {
        public function __construct() {
            $this->middleware('web');
        }

        public function load() {
            $salesReps = User::where('profile', 3)->orderBy('name', 'asc')->get();
            return view('admin/productcodes', [ 'salesReps' => $salesReps ]);
        }

        public function index() {
            $productCodes = ProductCode::orderBy('created_at', 'desc')->get();

            foreach ($productCodes as $productCode) {
                $salesRep = User::select('name')->where('profile', 3)->find($productCode->sales_rep);
                $productCode->sales_rep = [ 'id' => $productCode->sales_rep, 'name' => $salesRep->name ];
            }

            return response()->json([ 'pcodes' => $productCodes ], 200);
        }

        public function create(Request $request) {
            $validator = Validator::make($request->all(), [
                'code_count' => 'required|integer',
                'sales_rep'  => 'required|integer|exists:users,id',
                'validity'   => 'required|boolean',
                'valid_from' => 'exclude_if:validity,0|date',
                'valid_to'   => 'exclude_if:validity,0|date'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status'  => false,
                    'message' => $validator->errors()
                ], 400);
            }

            try {
                $codes = array();
                $codeCount = $request->input('code_count');

                for ($i = 0; $i < $codeCount; $i++) {
                    $code = strtoupper(Str::random(16));
                    $productCode = ProductCode::where('product_code', $code)->first();

                    if (!$productCode) {
                        $codes[] = $code;
                    }
                }

                foreach ($codes as $code) {
                    $pCode               = new ProductCode;
                    $pCode->sales_rep    = $request->input('sales_rep');
                    $pCode->product_code = $code;
                    $pCode->validity     = $request->input('validity');
                    $pCode->valid_from   = $request->input('valid_from');
                    $pCode->valid_to     = $request->input('valid_to');
                    $pCode->save();
                }

                return response()->json([
                    'status'  => true,
                    'message' => 'Generated Product Codes',
                    'codes'   => $codes
                ], 200);
            } catch (\Exception $e) {
                return response()->json([
                    'status'  => false,
                    'message' => 'Error in generating Product Codes'
                ], 409);
            }
        }

        public function update(Request $request) {
            $validator = Validator::make($request->all(), [
                'id'         => 'required|integer|exists:product_codes',
                'sales_rep'  => 'required|integer|exists:users,id',
                'validity'   => 'required|boolean',
                'valid_from' => 'exclude_if:validity,0|date',
                'valid_to'   => 'exclude_if:validity,0|date',
                'status'     => 'required|numeric|max:1'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status'  => false,
                    'message' => $validator->errors()
                ], 400);
            }

            try {
                $pCode             = ProductCode::find($request->input('id'));
                $pCode->sales_rep  = $request->input('sales_rep');
                $pCode->validity   = $request->input('validity');
                $pCode->valid_from = $request->input('valid_from');
                $pCode->valid_to   = $request->input('valid_to');
                $pCode->status     = $request->input('status');
                $pCode->save();

                return response()->json([
                    'status'  => true,
                    'message' => 'Updated Product Code'
                ], 200);
            } catch (\Exception $e) {
                return response()->json([
                    'status'  => false,
                    'message' => 'Failed to update Product Code'
                ], 409);
            }
        }

        public function delete(Request $request) {
            $pCode = ProductCode::find($request->input('id'));

            if ($pCode != null) {
                $pCode->delete();

                return response()->json([
                    'status'  => true,
                    'message' => 'Deleted Product Code'
                ], 200);
            }

            return response()->json([
                'status'  => false,
                'message' => 'No Product Code exists with the given ID'
            ], 200);
        }
    }
?>
