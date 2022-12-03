<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

use App\Http\Controllers\Controller;
use App\Models\User;

class SalesRepController extends Controller
{
    public function __construct()
    {
        $this->middleware('web');
    }

    public function load()
    {
        return view('admin/salesreps');
    }

    public function index()
    {
        $salesReps = User::where('profile', 3)->orderBy('created_at', 'desc')->get();
        return response()->json(['salesreps' => $salesReps], 200);
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'      => 'required|string|max:30',
            'mobile_no' => 'required|digits:10|unique:users',
            'email'     => 'required|email|max:50|unique:users',
            'location'  => 'string|max:25'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'  => false,
                'message' => $validator->errors()
            ], 400);
        }

        try {
            $user            = new User;
            $user->profile   = 3;
            $user->name      = $request->input('name');
            $user->mobile_no = $request->input('mobile_no');
            $user->email     = $request->input('email');
            $user->password  = app('hash')->make(Str::random(10));
            $user->location  = $request->input('location');
            $user->save();

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
            'id'        => 'required|integer|exists:users',
            'name'      => 'required|string|max:30',
            'mobile_no' => 'required|digits:10',
            'email'     => 'required|email|max:50',
            'location'  => 'string|max:25',
            'status'    => 'required|numeric|max:1'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'  => false,
                'message' => $validator->errors()
            ], 400);
        }

        try {
            $user            = User::find($request->input('id'));
            $user->name      = $request->input('name');
            $user->mobile_no = $request->input('mobile_no');
            $user->email     = $request->input('email');
            $user->location  = $request->input('location');
            $user->status    = $request->input('status');
            $user->save();

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
        $salesRep = User::where('profile', 3)->find($request->input('id'));

        if ($salesRep != null) {
            $salesRep->delete();

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
