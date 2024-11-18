<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\Order_items;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Order_addresess;
use App\Notifications\createorder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Illuminate\Notifications\DatabaseNotification;

class CheckOutController extends Controller
{

    public function index(){
        $data['route']='carts';
        $data['carts'] = Cart::where('user_id',Auth::id())->get();
        $data['user'] = User::where('id',Auth::id())->first();

        return view('website.checkout.checkout',$data);
    }
    public function CreateOrder(Request $request){

        $items = Cart::where('user_id',Auth::id())->get();

        if ($items->isEmpty()) {
            return redirect()->back()->with('error', 'السلة فارغة.');
        }



        $request->validate([
            'fname' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:11'],
            'address1' => ['required', 'string', 'max:255'],
            'address2' => ['required', 'string', 'max:255'],
            'country' => ['required', 'string', 'max:255'],
            'city' => ['required', 'max:255'],
            'pincode' => ['required','max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
        ]);

        DB::beginTransaction();
        try {

        $randomNumber = mt_rand(10, 99999);


        $order = Order::create([
            'user_id' => Auth::id(),
            'number' => date("Y") . $randomNumber,
            'total'=>$request->total_price,
            'status'=>'pending',
        ]);

        //
        $users = User::where('is_admin',1)->get();

        $user_create_order = Auth::user()->fname;
        Notification::send($users, new createorder($order->id, $user_create_order));
        //
        foreach ($items as $cart_items) {

                Order_items::create([
                    'order_id' => $order->id,
                    'product_id' => $cart_items->product_id,
                    'product_name' => $cart_items->product->name,
                    'price' => $cart_items->product->selling_price,
                    'quantity' => $cart_items->qty,
                ]);

        }
        Order_addresess::create([
            'order_id'=>$order->id,
            'fname' => $request->fname,
            'lname' => $request->lname,
            'phone' => $request->phone,
            'address1' => $request->address1,
            'address2' => $request->address2,
            'country' => $request->country,
            'city' => $request->city,
            'pincode' => $request->pincode,
            'email' => $request->email,
        ]);


        // $carts = Cart::where('user_id',Auth::id())->get();
        // foreach($carts as $cart){
        //     $cart->delete();
        // }

        // Cart::where('user_id', Auth::id())->delete();


            $order->tracks()->create([
                'status'=>'pending',
                'message'=>$user_create_order .'  user',
            ]);


        DB::commit();

    }catch (\Exception $e) {
        DB::rollback();
        return redirect()->route('home')->with('error', 'حدث خطأ أثناء إنشاء الطلب');
    }

    return redirect()->route('payment');

    }
    // public function payment(){
    //     return view('website.payment.payment');
    // }


}
