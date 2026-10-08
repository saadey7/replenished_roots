<?php

namespace App\Http\Controllers\Website;

use DB;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Wishlist;
use App\Models\Order;
use App\Models\User;
use App\Models\Country;
use App\Models\City;
use Illuminate\Http\Request;
use App\Models\ProductReviews;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Mail;

class WebsiteController extends Controller
{
    public function index(){
        $products = Product::with(['images', 'additionalInfos', 'reviews'])->latest()->take(8)->get();
        $products->map(function($item){
            $getAvgRating = ProductReviews::where('product_id', $item->id)->avg('rating');
            $item->avgRating = $getAvgRating;
        });
        $testimonials = ProductReviews::with('user')->get();
        if($testimonials->count() >= 3){
            $testimonials = $testimonials;
        }else{
            $data = [
                (object)[
                    'rating' => 5,
                    'review' => 'Tastes great, super easy to add into my routine, and I’ve noticed real improvements in my mood and energy.',
                    'user' => (object)[
                        'firstname' => 'Mariam',
                        'lastname' => 'A'
                    ]
                ],
                (object)[
                    'rating' => 5,
                    'review' => 'Finally found something that supports my cycle without any side effects. Highly recommend to anyone struggling with hormonal imbalance.',
                    'user' => (object)[
                        'firstname' => 'Sana',
                        'lastname' => 'R'
                    ]
                ],
                (object)[
                    'rating' => 5,
                    'review' => 'Finally found something that supports my cycle without any side effects. Highly recommend to anyone struggling with hormonal imbalance.',
                    'user' => (object)[
                        'firstname' => 'Emily',
                        'lastname' => 'R'
                    ]
                ],
            ];
            $testimonials = $data;
        }
        // return $testimonials;
        return view('website.pages.index', compact('products', 'testimonials'));
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

        $datas = $query->paginate(6);

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
        $user = Auth::guard('web')->user();
        $data = Product::where('product_id', $id)->with(['images', 'reviews', 'additionalInfos'])->first();
        $averageRating = $data->reviews()->avg('rating'); // e.g. 4.2
        $reviewCount   = $data->reviews()->count();
        if($user){
        $checkFav = Wishlist::where([['product_id', $data->id], ['user_id', $user->id]])->first();
        $data->is_fav = $checkFav ? 1 : 0;
        }else{
            $data->is_fav = 0;
        }
        $relatedProducts = Product::where('type', $data->type)->where('id', '!=', $data->id)->with(['images', 'reviews', 'additionalInfos'])->get();
        return view('website.pages.shop-details', compact('data', 'averageRating', 'reviewCount', 'relatedProducts'));
    }
    
    public function aboutUs(){
        return view('website.pages.about');
    }
    public function services(){
        return view('website.pages.services');
    }
    public function contactUs(){
        return view('website.pages.contact');
    }
    public function cart(){
        $user = Auth::guard('web')->user();
        if($user){
            $getCarts = Cart::where('user_id', $user->id)->with('product')->get();
        }else{
            $getCarts = [];
        }
        return view('website.pages.cart', compact('getCarts'));
    }
    public function wishlist(){
        $user = Auth::guard('web')->user();
        $getWishlist = Wishlist::where('user_id', $user->id)->with(['product', 'product.images', 'product.reviews'])->get();
        return view('website.pages.wishlist', compact('getWishlist'));
    }
    public function remove_wishlist_item($id)
    {
        $wishlist = Wishlist::find($id);

        if ($wishlist) {
            $wishlist->delete();
            return redirect()->back()->with('success', 'Item removed from wishlist!');
        }else{
            return redirect()->back()->with('error', 'Item not found in wishlist!');
        }
    }
    public function checkout(){
        $user = Auth::guard('web')->user();
        $getCountries = Country::get();
        if($user){
            $getCarts = Cart::where('user_id', $user->id)->with('product')->get();
        }else{
            $getCarts = [];
        }
        return view('website.pages.checkout', compact('getCarts', 'getCountries'));
    }
    
    public function getCities($stateId)
    {
        $cities = City::where('country_id', $stateId)->get();
        return response()->json($cities);
    }

    public function add_to_cart(Request $request){
        $user = Auth::user();
        $input = $request->all();
        $input['user_id'] = $user->id;
        $check = Cart::where([['product_id', $request->product_id], ['user_id', $user->id]])->first();
        if ($check) {
            $qty = $check->quantity + $request->quantity;
            $total = $check->unit_price * $qty;
            $check->update(['quantity' => $qty, 'total' => $total]);
            return redirect()->back()->with('success', 'Added to cart successfully');
        }else{
            $getProduct = Product::find($request->product_id);
            $getProductPrice = $getProduct->is_discount ? $getProduct->discount_price : $getProduct->price;
            $input['unit_price'] = $getProductPrice;
            $input['total'] = $getProductPrice * $request->quantity;
            $data = Cart::create($input);
            return redirect()->back()->with('success', 'Added to cart successfully');
        }
    }

    public function cartUpdate(Request $request)
    {
        if ($request->has('quantities')) {
            foreach ($request->quantities as $cartId => $qty) {
                $cart = Cart::find($cartId);
                if ($cart) {
                    $cart->quantity = $qty;
                    $cart->total = $cart->unit_price * $qty;
                    $cart->save();
                }
            }
        }

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Cart updated successfully!',
            ]);
        }

        return redirect()->back()->with('success', 'Cart updated successfully!');
    }

    public function removeCartItem($id)
    {
        $cart = Cart::find($id);

        if ($cart) {
            $cart->delete();
            return redirect()->back()->with('success', 'Item removed from cart!');
        }else{
            return redirect()->back()->with('error', 'Item not found in cart!');
        }
    }

    public function add_to_wishlist(Request $request){
        $user = Auth::user();
        $input = $request->all();
        $input['user_id'] = $user->id;
        $check = Wishlist::where([['product_id', $request->product_id], ['user_id', $user->id]])->first();
        if($check){
            $check->delete();
            return redirect()->back()->with('success', 'Item removed from wishlist!');
        }else{
            $data = Wishlist::create($input);
            return redirect()->back()->with('success', 'Item added to wishlist!');
        }
    }

    public function storeFeedback(Request $request){
        $user = Auth::user();
        $input = $request->all();
        $input['user_id'] = $user->id;
        $checkFeedback = ProductReviews::where([['user_id', $user->id], ['product_id', $request->product_id]])->first();
        if($checkFeedback){
            return redirect()->back()->with('warning', 'You Already Give Feedback on this Product');
        }else{
            $data = ProductReviews::create($input);
            return redirect()->back()->with('success', 'Feedback Added Successfully');
        }
    }
    
    public function thankYou($id){
        $order = Order::where('order_id', $id)->with(['orderdetail', 'user'])->first();
        return view('website.pages.thankyou', compact('order'));
    }
    
    public function sendMail(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email',
            'phone'   => 'nullable|string|max:50',
            'message' => 'required|string',
        ]);
        \Log::info('sendMail hit', $request->all());
        $data = [
            'name'         => $request->input('name'),
            'email'        => $request->input('email'),
            'phone'        => $request->input('phone'),
            'user_message' => $request->input('message'), // 'message' is reserved in mail views
        ];

        Mail::send('mail/support', $data, function ($message) {
            $message->to("saadey7@gmail.com", "Replenished Roots")
                    ->subject('Contact Form Query');
        });

        // Send to User
        Mail::send('mail/auto_reply', $data, function ($message) use ($data) {
            $message->to($data['email'], $data['name'])
                    ->subject('We’ve Received Your Query');
        });

        return redirect()->back()->with('success', 'Contact form successfully submitted. Thank you, I will get back to you soon!');
    }
    
    public function saveToken(Request $request)
    {
        $user = Auth::guard('web')->user();
        $is_update = User::find($user->id)->update(['fcm_token'=>$request->token]);
        return response()->json([
            'success'=>true
        ]);
    }
    
    public function terms(){
        return view('website.pages.terms');
    }
    public function privacy(){
        return view('website.pages.privacy');
    }
    public function storePolicies(){
        return view('website.pages.storePolicies');
    }


}