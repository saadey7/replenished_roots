<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\Store;
use Illuminate\Support\Facades\Auth;
use Validator;
use Carbon\Carbon;

class ProductController extends Controller
{
    public $success = 200;
    public $error = 404;
    public $validate_error = 401;

    public function home(Request $request)
    {
        $user = Auth::user();
        $store = Store::find($request->store_id);
        if($request->store_id && !$request->search){
            $store = Store::find($request->store_id);
            $product = Product::where('store_id', $request->store_id)->with(['images', 'store'])->paginate(10);
            return response()->json([
                'products' => $product,
                'message' => "$store->name Products",
                'status' => 'success',
            ],$this->success);
        }elseif($request->search && !$request->store_id){
            $product = Product::where('name', 'LIKE', "%$request->search%")->with(['images', 'store'])->paginate(10);
            return response()->json([
                'products' => $product,
                'message' => "$request->search Products",
                'status' => 'success',
            ],$this->success);
        }
        elseif($request->search && $request->store_id){
            $product = Product::where([['name', 'LIKE', "%$request->search%"], ['store_id', $request->store_id]])->with(['images', 'store'])->paginate(10);
            return response()->json([
                'products' => $product,
                'message' => "$request->search Products $store->name Store",
                'status' => 'success',
            ],$this->success);
        }
        else{
            $product = Product::with(['images', 'store'])->paginate(10);
            return response()->json([
                'products' => $product,
                'message' => 'All Latest Product',
                'status' => 'success',
            ],$this->success);
        }
    }
    
    public function all_pro(Request $request)
    {
        $user = Auth::user();
        if($request->store_id){
            $store = Store::find($request->store_id);
            $product = Product::where('store_id', $request->store_id)->with(['images', 'store'])->get();
            return response()->json([
                'products' => $product,
                'message' => "$store->name Products",
                'status' => 'success',
            ],$this->success);
        }else{
            $product = Product::with(['images', 'store'])->get();
            return response()->json([
                'products' => $product,
                'message' => 'All Products',
                'status' => 'success',
            ],$this->success);
        }
    }
    
    public function all_store()
    {
        $user = Auth::user();
        $store = Store::all();
        return response()->json([
            'store' => $store,
            'message' => 'All Stores',
            'status' => 'success',
        ],$this->success);
    }

}
