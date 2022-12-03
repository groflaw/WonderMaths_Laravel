<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\PromoCode;

class PromoCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('web');
    }

    public function load()
    {
        return view('admin/promo_codes');
    }

    public function index()
    {
        $promoCodes = PromoCode::all();
        return response()->json(['promocodes' => $promoCodes], 200);
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'      => 'required|string|max:30',
            'discount' => 'required',
            'byrole'     => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'  => false,
                'message' => $validator->errors()
            ], 400);
        }

        try {
            $promo_code            = new PromoCode;
            $promo_code->name      = $request->input('name');
            $promo_code->discount  = $request->input('discount');
            $promo_code->role      = $request->input('byrole');
            $promo_code->commission = "successful commission";
            $promo_code->save();

            return response()->json([
                'status'  => true,
                'message' => 'Added new Sales Representative'
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'status'  => false,
                'message' => 'Failed to add Sales Representative'
            ], 409);
        }
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'      => 'required|string|max:30',
            'discount' => 'required',
            'byrole'     => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'  => false,
                'message' => $validator->errors()
            ], 400);
        }

        try {
            $promo_code            = PromoCode::find($request->input('id'));
            $promo_code->name      = $request->input('name');
            $promo_code->discount  = $request->input('discount');
            $promo_code->role      = $request->input('byrole');
            $promo_code->save();

            return response()->json([
                'status'  => true,
                'message' => 'Updated Sales Representative'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status'  => false,
                'message' => 'Failed to update Sales Representative'
            ], 409);
        }
    }

    public function delete(Request $request)
    {
        $promo_code = PromoCode::find($request->input('id'));

        if ($promo_code != null) {
            $promo_code->delete();

            return response()->json([
                'status'  => true,
                'message' => 'Deleted Sales Representative'
            ], 200);
        }

        return response()->json([
            'status'  => false,
            'message' => 'No Sales Representative exists with the given ID'
        ], 200);
    }
}
