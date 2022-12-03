<?php
    namespace App\Http\Controllers\API\Customer;

    use Illuminate\Http\Request;
    use Illuminate\Support\Str;
    use Illuminate\Support\Facades\Validator;
    use Razorpay\Api\Api;
    use App\Http\Controllers\Controller;
    use App\Models\Order;
    use App\Models\ProductCode;
    use App\Models\User;

    class OrderController extends Controller {
        private $razorpayKey;
        private $razorpaySecret;

        public function __construct() {
            $this->razorpayKey = env('RAZOR_KEY');
            $this->razorpaySecret = env('RAZOR_SECRET');
        }

        public function create(Request $request) {
            $validator = Validator::make($request->all(), [
                'user_id' => 'required|integer|exists:users,id',
                'price'   => 'required|numeric'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status'  => false,
                    'message' => $validator->errors()
                ], 400);
            }

            try {
                $rpReceipt = 'MMT-' . $request->input('user_id') . '-' . time();
                $rpAmount  = $request->input('price');

                $razorpayAPI   = new Api($this->razorpayKey, $this->razorpaySecret);
                $razorpayOrder = $razorpayAPI->order->create(array(
                    'amount'   => $rpAmount,
                    'currency' => 'INR',
                    'receipt'  => $rpReceipt
                ));

                $order           = new Order;
                $order->user_id  = $request->input('user_id');
                $order->price    = $request->input('price')/100;
                $order->receipt  = $rpReceipt;
                $order->order_id = $razorpayOrder->id;
                $order->status   = $razorpayOrder->status;
                $order->save();

                return response()->json([
                    'status'   => true,
                    'message'  => 'Order created',
                    'order_id' => $razorpayOrder->id
                ], 201);
            } catch (\Exception $e) {
                return response()->json([
                    'status'  => false,
                    'message' => 'Order creation failed'
                ], 409);
            }
        }

        public function updatesuccess(Request $request) {
            $validator = Validator::make($request->all(), [
                'order_id'   => 'required|string',
                'payment_id' => 'required|string',
                'signature'  => 'required|string'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status'  => false,
                    'message' => $validator->errors()
                ], 400);
            }

            try {
                $order             = Order::where('order_id', $request->input('order_id'))->first();
                $order->status     = 'paid';
                $order->payment_id = $request->input('payment_id');
                $order->signature  = $request->input('signature');
                $order->save();

                $productCode0 = strtoupper(Str::random(16));
                $productCode1 = ProductCode::where('product_code', $productCode0)->first();
                $productCode2               = new ProductCode;
                $productCode2->sales_rep    = 1;
                $productCode2->product_code = $productCode0;
                $productCode2->validity     = 0;
                $productCode2->save();

                $customer                  = User::where('profile', 4)->find($order->user_id);
                $customer->product_code_id = $productCode2->id;
                $customer->save();

                return response()->json([
                    'status'  => true,
                    'message' => 'Order updated',
                    'pcode'   => $productCode0
                ], 200);
            } catch (\Exception $e) {
                return response()->json([
                    'status'  => false,
                    'message' => 'Order updation failed'
                ], 409);
            }
        }

        public function updatefailure(Request $request) {
            $validator = Validator::make($request->all(), [
                'order_id'   => 'required|string',
                'error'      => 'required|string',
                'error_desc' => 'required|string'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status'  => false,
                    'message' => $validator->errors()
                ], 400);
            }

            try {
                $order             = Order::where('order_id', $request->input('order_id'))->first();
                $order->status     = 'failed';
                $order->error      = $request->input('error');
                $order->error_desc = $request->input('error_desc');
                $order->save();

                return response()->json([
                    'status'  => true,
                    'message' => 'Order updated'
                ], 200);
            } catch (\Exception $e) {
                return response()->json([
                    'status'  => false,
                    'message' => 'Order updation failed'
                ], 409);
            }
        }
    }
?>
