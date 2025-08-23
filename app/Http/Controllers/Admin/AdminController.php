<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderDetail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ProductImages;
use App\Models\ProductReviews;
use App\Models\NotificationUser;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Models\ProductAdditionalInfo;

class AdminController extends Controller
{
    public function index()
    {
        $products = Product::count();
        $orders = Order::count();
        $users = User::count();
        $today_order = Order::whereDate('created_at', Carbon::today())->with('user')->get();
        return view('admin/pages/index', ['products'=>$products, 'orders'=>$orders, 'today_order'=>$today_order, 'users'=>$users]);
    }
    public function allUser()
    {
        $data = User::all();
        return view('admin/pages/all-user',['data'=>$data]);
    }
    public function deleteUser(Request $request)
    {
        $delete = User::where('id', $request->id)->delete();
        return back()->with('error','User Deleted successfully!');
    }

    public function products()
    {
        $data = Product::with(['images', 'reviews', 'additionalInfos'])->get();
        return view('admin/pages/products',['data' => $data]);
    }
    
    public function addProduct()
    {
        return view('admin/pages/addProduct');
    }

    public function storeData(Request $request)
    {
        $input = $request->all();
        $input['tags'] =  explode(',', $request->tags);
        $input['categories'] =  explode(',', $request->categories);
        $input['product_id'] = $this->generateUniqueId();
        // return $request->is_discount ? $input : 'disoff';
        // die;
        if($request->images == null){
            return back()->with('error', 'Atleast one image required');
        }
        if($request->is_discount){
            $input['is_discount'] =  1;
        }
        if($request->add_info_name == null){
            return back()->with('error', 'Atleast one Addtional Info required');
        }
        
        $products = Product::create($input);

        if($request->hasFile("images")){
            $files=$request->file("images");
            foreach($files as $file){
                $imageName=time().rand(0000, 9999).'.'.$file->getClientOriginalExtension();
                $request['product_id']=$products->id;
                $request['images']=$imageName;
                $file->move(\public_path("/assets/images/product/"),$imageName);
                ProductImages::create([
                    'image' => $imageName,
                    'product_id' => $products->id
                ]);
            }
        }
        if($request->add_info_name && $request->add_info_value){
            foreach ($request->add_info_name as $index => $name) {
                ProductAdditionalInfo::create([
                    'product_id' => $products->id,
                    'name' => $name,
                    'value' => $request->add_info_value[$index] ?? null, // match by index
                ]);
            }
        }
        return back()->with('success','Product created successfully!');
    }

    private function generateUniqueId($length = 7) {
    do {
        $id = Str::upper(Str::random($length));
    } while (Product::where('product_id', $id)->exists());

    return $id;
}
    
    public function viewPro($id)
    {
        $data = Product::where('id', $id)->with(['images', 'reviews', 'additionalInfos'])->first();
        $averageRating = $data->reviews()->avg('rating'); // e.g. 4.2
        $reviewCount   = $data->reviews()->count();
        return view('admin/pages/product_detail',['product' => $data, 'averageRating' => $averageRating , 'reviewCount' => $reviewCount]);
    }
    public function editPro($id)
    {
        $data = Product::where('id', $id)->with(['images', 'reviews', 'additionalInfos'])->first();
        $stores = Store::all();
        return view('admin/pages/editProduct',['data'=>$data, 'stores' => $stores]);
    }

    public function update(Request $request)
    {
        $input = $request->all();
        $products = Product::with('images')->find($request->id);
        if($request->old){
           ProductImages::whereNotIn('id', $request->old)->where('product_id',$request->id)->delete(); 
        }
        if(!isset($request->old))
        {
           return back()->with('error','Atleast one image required'); 
        }
        
        if($request->hasFile("images")){
            $files=$request->file("images");
            foreach($files as $file){
                $imageName=time().rand(0000, 9999).'.'.$file->getClientOriginalExtension();
                $request['product_id']=$products->id;
                $request['images']=$imageName;
                $file->move(\public_path("/assets/images/product/"),$imageName);
                ProductImages::create([
                    'image' => $imageName,
                    'product_id' => $products->id
                ]);
            }
        }
        $update = $products->update($input);
        return back()->with('success','Product Updated successfully!');
    }

    public function delete(Request $request)
    {
        $update = Product::where('id', $request->id)->delete();
        return back()->with('error','Product Deleted successfully!');
    }
    
    public function order()
    {
        $order = Order::with(['user', 'orderdetail'])->get();
        return view('admin/pages/allorders', ['data'=>$order]);
    }
    
    public function dispatch_order($id)
    {
        $order = Order::find($id);
        $user = User::find($order->user_id);
        $order = Order::where('id', $id)->update(['order_status' => 'Dispatched']);
        $orderDetail = OrderDetail::where('order_id', $id)->get();
        foreach($orderDetail as $detail){
            $orderDetail = OrderDetail::where('id', $detail->id)->update(['order_status' => 'Dispatched']);
        }
        $message = "Your Order Has Been Dispatched";
        $data_array = [
            'title' => 'Order Dispatched',
            'body' => $message,
            'type' => 'dispatch',
            'user' => $user,
            'id' => $id,
            'description' => $message
        ];
        $user->sendNotification($user->id, $data_array, $message);
        $notify = NotificationUser::create([
            'user_id' => $user->id,
            'send_to' => $user->id,
            'message' => $message,
            'title' => 'Order Dispatched',
            'type' => "dispatch",
            'redirect' => $id
        ]);
        return back()->with('success','Order Dispatched Successfully!');
    }
    
    public function deliver_order($id)
    {
        $order = Order::find($id);
        $user = User::find($order->user_id);
        $order = Order::where('id', $id)->update(['order_status' => 'Delivered']);
        $orderDetail = OrderDetail::where('order_id', $id)->get();
        foreach($orderDetail as $detail){
            $orderDetail = OrderDetail::where('id', $detail->id)->update(['order_status' => 'Delivered']);
        }
        $message = "Your Order Has Been Delivered";
        $data_array = [
            'title' => 'Order Delivered',
            'body' => $message,
            'type' => 'deliver',
            'user' => $user,
            'id' => $id,
            'description' => $message
        ];
        $user->sendNotification($user->id, $data_array, $message);
        $notify = NotificationUser::create([
            'user_id' => $user->id,
            'send_to' => $user->id,
            'message' => $message,
            'title' => 'Order Delivered',
            'type' => "deliver",
            'redirect' => $id
        ]);
        return back()->with('success','Order Delivered Successfully!');
    }
    
    public function complete_order($id)
    {
        $order = Order::find($id);
        $user = User::find($order->user_id);
        $order = Order::where('id', $id)->update(['order_status' => 'Completed']);
        $orderDetail = OrderDetail::where('order_id', $id)->get();
        foreach($orderDetail as $detail){
            $orderDetail = OrderDetail::where('id', $detail->id)->update(['order_status' => 'Completed']);
        }
        $message = "Your Order Has Been Completed";
        $data_array = [
            'title' => 'Order Completed',
            'body' => $message,
            'type' => 'complete',
            'user' => $user,
            'id' => $id,
            'description' => $message
        ];
        $user->sendNotification($user->id, $data_array, $message);
        $notify = NotificationUser::create([
            'user_id' => $user->id,
            'send_to' => $user->id,
            'message' => $message,
            'title' => 'Order Completed',
            'type' => "complete",
            'redirect' => $id
        ]);
        return back()->with('success','Order Completed Successfully!');
    }
    
    
    public function allCities()
    {
        $data = City::with('province')->get();
        $province = Province::all();
        $pro = Province::all();
        return view('admin/pages/addCity',['datas'=>$data, 'province'=>$province, 'province2'=>$pro]);
    }
    
    public function cityStore(Request $request)
    {
        $pro =new City([
            "province_id" =>$request->proID,
            "city" =>  $request->city,
            "label" => $request->city,
            "value" => $request->city,
        ]);
        $pro->save();
        return back()->with('success','City Added successfully!');
    }

    public function updateCity(Request $request)
    {
        $input = $request->all();
        $pro = City::find($request->id);
        $update = $pro->update($input);
        return back()->with('success','City Updated successfully!');
    }

    public function deleteCity(Request $request)
    {
        $delete = City::where('id', $request->id)->delete();
        return back()->with('error','City Deleted successfully!');
    }
    
    
    public function allProvinces()
    {
        $data = Province::all();
        return view('admin/pages/addProvince',['datas'=>$data]);
    }

    public function provinceStore(Request $request)
    {
        $pro =new Province([
            "province" =>$request->province,
            "label" => $request->province,
            "value" => $request->province,
        ]);
        $pro->save();
        return back()->with('success','Province Added successfully!');
    }

    public function updateProvince(Request $request)
    {
        $input = $request->all();
        $pro = Province::find($request->id);
        $input['label'] = $request->province;
        $input['value'] = $request->province;
        $update = $pro->update($input);
        return back()->with('success','Province Updated successfully!');
    }

    public function deleteProvince(Request $request)
    {
        $delete = Province::where('id', $request->id)->delete();
        return back()->with('error','Province Deleted successfully!');
    }
    
    public function alllegal()
    {
        $data = Legal::all();
        return view('admin/pages/alllegal',['data'=>$data]);
    }

    public function legalStore(Request $request)
    {
        $input = $request->all();
        $check = Legal::where('contentName', $request->contentName)->first();
        if(!$check){
           $dataa = base64_decode($request->content);
            $input['content'] = $dataa;
            $input['contentName'] = $request->contentName;
            $data = Legal::create($input);
            return back()->with('success',"$request->contentName Added Successfully!"); 
        }else{
            $dataa = base64_decode($request->content);
            $input['content'] = $dataa;
            $input['contentName'] = $request->contentName;
            $data = $check->update($input);
            return back()->with('success',"$request->contentName Added Successfully!");
        }
            
    }
    
    public function editLegal($id)
    {
        $data = Legal::where('id', $id)->first();
        return view('admin/pages/editLegal',['data'=>$data]);
    }
    
    public function updateLegal(Request $request)
    {
        $input = $request->all();
        $data = Legal::where('id', $request->id)->first();
        $dataa = base64_decode($request->content);
        $input['content'] = $dataa;
        $legal = $data->update($input);
        return back()->with('success',"$request->contentName Added Successfully!");
    }

    public function deletelegal(Request $request)
    {
        $delete = Legal::where('id', $request->id)->delete();
        return back()->with('error','Legal Content Deleted successfully!');
    }
    
    public function deliveryFees(){
        $data = DeliveryFees::all();
        return view('admin/pages/deliveryFees',['datas'=>$data]);
    }
    
    public function deliveryFeesStore(Request $request){
        $input = $request->all();
        
        if($request->id){
            $data = DeliveryFees::where('id', $request->id)->first();
            if($request->name == ''){
                $data = $data->update(['price' => $request->price]);
            }else{
                $data = $data->update(['price' => $request->price, 'name' => $request->name]);
            }
            return back()->with('success',"Services Added Successfully!");
        }else{
            $check = DeliveryFees::where('name', $request->name)->first();
            if(!$check){
                $data = DeliveryFees::create($input);
                return back()->with('success',"Services Added Successfully!");
            }else{
                return back()->with('success',"Services Already Added!");
            }
        }
    }
    
    public function prepared_order($id)
    {
        $order = Order::find($id);
        $user = User::find($order->user_id);
        $order = Order::where('id', $id)->update(['order_status' => 'Prepared']);
        $orderDetail = OrderDetail::where('order_id', $id)->get();
        foreach($orderDetail as $detail){
            $orderDetail = OrderDetail::where('id', $detail->id)->update(['order_status' => 'Prepared']);
        }
        $message = "Your Order Has Been Prepared";
        $data_array = [
            'title' => 'Order Prepared',
            'body' => $message,
            'type' => 'prepared',
            'user' => $user,
            'id' => $id,
            'description' => $message
        ];
        $user->sendNotification($user->id, $data_array, $message);
        $notify = NotificationUser::create([
            'user_id' => $user->id,
            'send_to' => $user->id,
            'message' => $message,
            'title' => 'Order Prepared',
            'type' => "prepared",
            'redirect' => $id
        ]);
        return back()->with('success','Order Prepared Successfully!');
    }
    
    
    public function allschedule()
    {
        $data = Schedule::with('times')->get();
        return view('admin/pages/allschedule',['data'=>$data]);
    }
    
    public function scheduleStore(Request $request)
    {
        $input = $request->all();
        $data = Schedule::create($input);
        return back()->with('success',"Schedule Added Successfully!"); 
    }
    
    public function updateschedule(Request $request)
    {
        $input = $request->all();
        $data = Schedule::where('id', $request->id)->first();
        $legal = $data->update($input);
        return back()->with('success',"Schedule Updated Successfully!");
    }

    public function deleteschedule(Request $request)
    {
        $delete = Schedule::where('id', $request->id)->delete();
        return back()->with('error','Schedule Deleted successfully!');
    }
    
    
    
    public function allscheduletime()
    {
        $allschedule = Schedule::all();
        $data = ScheduleTime::with('dates')->get();
        return view('admin/pages/allscheduletime',['data'=>$data, 'allschedule'=>$allschedule]);
    }
    
    public function scheduletimeStore(Request $request)
    {
        $input = $request->all();
        $data = ScheduleTime::create($input);
        return back()->with('success',"Schedule Time Added Successfully!"); 
    }
    
    public function updatescheduletime(Request $request)
    {
        $input = $request->all();
        $data = ScheduleTime::where('id', $request->id)->first();
        $legal = $data->update($input);
        return back()->with('success',"Schedule Time Updated Successfully!");
    }

    public function deletescheduletime(Request $request)
    {
        $delete = ScheduleTime::where('id', $request->id)->delete();
        return back()->with('error','Schedule Time Deleted successfully!');
    }
    
    
    public function allStores()
    {
        $data = Store::all();
        return view('admin/pages/addStore',['datas'=>$data]);
    }
    
    public function addStore(Request $request)
    {
        $input = $request->all();
        if($request->hasFile("logo")){
            $file=$request->file("logo");
            $imageName=time().rand(0000, 9999).'.'.$file->getClientOriginalExtension();
            $file->move(\public_path("/assets/store/logos/"),$imageName);
            $input['logo']=$imageName;
        }
        $pro = Store::create($input);
        return back()->with('success','Store Added successfully!');
    }

    public function updateStore(Request $request)
    {
        $input = $request->all();
        $pro = Store::find($request->id);
        if ($request->hasFile('logo')) {

            //code for remove old file

            if ($pro->logo != null) {
                $url_path = parse_url($pro->logo, PHP_URL_PATH);
                $basename = pathinfo($url_path, PATHINFO_BASENAME);
                $file_old =  public_path("assets/store/logos/$basename");
                unlink($file_old);
            }
            //upload new file
            $extension = $request->logo->extension();
            $filename = time() . "_." . $extension;
            $request->logo->move(public_path('assets/store/logos'), $filename);
            $input['logo'] = $filename;
        }
        $update = $pro->update($input);
        return back()->with('success','Store Updated successfully!');
    }

    public function deleteStore(Request $request)
    {
        $delete = Store::where('id', $request->id)->delete();
        return back()->with('error','Store Deleted successfully!');
    }

}