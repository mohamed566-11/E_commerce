<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Order_items;
use Illuminate\Http\Request;
use App\Models\deliveryorder;
use App\Events\quantityproduct;
use App\Models\Order_addresess;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ordercontroller extends Controller
{
    public function index()
    {
        $data['route']="orders";
        $data['orders']=Order::with('user')->get();
        return view('dashboard.orders.showoreders',$data);
    }
    public function orderdetails($id)
    {
        $data['route']="orders";

        $data['orderdetails']=Order_items::where('order_id',$id)->get();
        $data['orderadresess']=Order_addresess::where('order_id',$id)->first();
        return view('dashboard.orders.orderdetails',$data);
    }
    public function editstatus(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $user = Auth::user();
        if ($user->is_admin == 1) {
        if($order->status != $request->status){
            $order->tracks()->create([
                'status'=>$request->status,
                'message'=>$user->fname .'  admin',
            ]);
        }
    }else{
        if($order->status != $request->status){
            $order->tracks()->create([
                'status'=>$request->status,
                'message'=>$user->fname .'  user',
            ]);
        }
    }


        $order->update([
            'status'=>$request->status,
        ]);

        event(new quantityproduct($order));


        // if ($order->status === "completed") {
        //     foreach ($order->items as $item) {
        //         $item->product->qty-=$item->quantity;
        //         $item->product->update([
        //             'qty'=>$item->product->qty
        //         ]);
        //         // dd($item->quantity);
        //     }
        // }
        return redirect()->route('orders.index')->with('success',trans("messages_trans.success_update"));


    }
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();
        return redirect()->route('orders.index')->with('success',trans("messages_trans.success_update"));
    }


    /////// front

    public function showmyorders(){
        $data['route']="orders";
        $data['orders']=Order::where('user_id',Auth::user()->id)->with('user')->latest()->get();
        return view('website.orders.showoreders',$data);
    }
    public function frontorderdetails($order_id)
    {
        $data['route']="orders";
        $data['orderdetails']=Order_items::where('order_id',$order_id)->get();
        $data['orderadresess']=Order_addresess::where('order_id',$order_id)->first();
        return view('website.orders.orderdetails',$data);
    }
    public function CancelOrder(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $user = Auth::user();
        if ($user->is_admin == 1) {
            if($order->status != 'cancelled'){
                $order->tracks()->create([
                    'status'=>'cancelled',
                    'message'=>$user->fname .' admin',
                ]);
            }
        }
        else{
        if($order->status != 'cancelled'){
            $order->tracks()->create([
                'status'=>'cancelled',
                'message'=>$user->fname .'  user',
            ]);
        }
    }


        $order->update([
            'status'=>'cancelled',
        ]);



        return redirect()->route('showmyorders')->with('success',"success cancel order");


    }

    // public function orderdetailsfornotification($id)
    // {
    //     $data['route']="orders";

    //     $data['orderdetails']=Order_items::where('order_id',$id)->get();
    //     $data['orderadresess']=Order_addresess::where('order_id',$id)->first();
    //     return view('dashboard.orders.orderdetails',$data);
    // }
    public function addToDelivery(Request $request,$id){

        $order = Order::findOrFail($id);

        DB::beginTransaction();

        $deliveryorder = deliveryorder::create([
            'user_id' =>$request->user_id,
            'order_number' =>$order->number,
            'order_id' =>$id,
        ]);

        if($order->status != 'delivered'){
            $order->tracks()->create([
                'status'=>'delivered',
                'message'=>Auth::user()->fname .'  admin',
            ]);
        }
        $order->update([
            'status'=>'delivered',
        ]);

        DB::commit();
        return redirect()->route('orders.index')->with('success',trans("messages_trans.success_update"));

    }
    public function delivery_orders(){
        $route = 'delivery_orders';
        $user = Auth::user();
        $orders = $user->deliveryorders;
        return view('delivery.delivery_orders',compact('route','orders'));
    }


}
