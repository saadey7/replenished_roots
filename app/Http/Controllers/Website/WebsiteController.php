<?php

namespace App\Http\Controllers\Website;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\ProductReviews;
use App\Http\Controllers\Controller;
use DB;

class WebsiteController extends Controller
{
    public function index(){
        $products = Product::with(['images', 'additionalInfos', 'reviews'])->latest()->take(8)->get();
        $products->map(function($item){
            $getAvgRating = ProductReviews::where('product_id', $item->id)->avg('rating');
            $item->avgRating = $getAvgRating;
        });
        return view('website.pages.index', compact('products'));
    }

    public function shop(Request $request)
    {
        // return [$request->min_price, $request->max_price];
        $query = Product::query();

        // ✅ Price Filter
        if ($request->has('min_price') && $request->has('max_price')) {
    $query->where(function($q) use ($request) {
        $q->where(function($q2) use ($request) {
            $q2->where('is_discount', 1)
               ->whereBetween(DB::raw('CAST(discount_price AS DECIMAL(10,2))'), [$request->min_price, $request->max_price]);
        })
        ->orWhere(function($q3) use ($request) {
            $q3->where('is_discount', 0)
               ->whereBetween(DB::raw('CAST(price AS DECIMAL(10,2))'), [$request->min_price, $request->max_price]);
        });
    });
}

        // ✅ Sorting (optional, if you want to use the "orderby" dropdown)
        if ($request->orderby) {
            switch ($request->orderby) {
                case 'popularity':
                    // Example: sort by reviews count
                    $query->withCount('reviews')->orderBy('reviews_count', 'desc');
                    break;
                case 'rating':
                    // Example: sort by average rating
                    $query->withAvg('reviews', 'rating')->orderBy('reviews_avg_rating', 'desc');
                    break;
                case 'date':
                    $query->latest();
                    break;
                case 'price':
                    $query->orderBy('price', 'asc');
                    break;
                case 'price-desc':
                    $query->orderBy('price', 'desc');
                    break;
            }
        } else {
            $query->latest();
        }

        $datas = $query->paginate(9);

        // add avgRating for each product
        $datas->getCollection()->transform(function ($item) {
            $item->avgRating = $item->reviews->avg('rating');
            return $item;
        });

        // ✅ Collect unique categories (for sidebar)
        $getCategories = collect(Product::pluck('categories'))
            ->flatMap(fn($cat) => $cat)
            ->unique()
            ->values()
            ->toArray();

        return view('website.pages.shop', compact('datas', 'getCategories'));
    }

    public function proDetail($id)
    {
        $data = Product::where('product_id', $id)->with(['images', 'reviews', 'additionalInfos'])->first();
        $averageRating = $data->reviews()->avg('rating'); // e.g. 4.2
        $reviewCount   = $data->reviews()->count();
        return view('website.pages.shop-details', compact('data', 'averageRating', 'reviewCount'));
    }
    
    public function aboutUs(){
        return view('website.pages.contact');
    }

    public function login(){
        return view('website.pages.login');
    }

    public function register(){
        return view('website.pages.register');
    }

}