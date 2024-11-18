<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Order_items;
use Illuminate\Http\Request;
use App\Events\quantityproduct;
use App\Models\Order_addresess;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class dashboard_deliverycontroller extends Controller
{
    public function index(){
        $data['route'] = 'orderdelivery';
        return view('delivery.dashboard_delivery',$data);
    }
    public function search(Request $request)
{
    // البحث عن الطلب برقم الطلب
    $orderId = $request->input('order_number');
    $order = Order::where('number', $orderId)
    ->where('status','=','delivered')
    ->first();
    $route= 'orderdelivery';
    $notFound= true;

    if ($order) {
        return view('delivery.dashboard_delivery', compact('route','order'));
    } else {
        return view('delivery.dashboard_delivery', compact('route','notFound'));
    }
}

public function showmyorders($id)
    {
        $data['route']="orders";

        $data['orderdetails']=Order_items::where('order_id',$id)->get();
        $data['orderadresess']=Order_addresess::where('order_id',$id)->first();
        return view('delivery.dashboard_delivery_show',$data);
    }
    public function editstatus(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $user = Auth::user();
        DB::beginTransaction();
        if($order->status != 'completed'){
            $order->tracks()->create([
                'status'=>'completed',
                'message'=>$user->fname .'  delivery',
            ]);
        }

        $order->deliveryorder->update([
            'delivery_order_status'=>'done',
        ]);

        $order->update([
            'status'=>'completed',
        ]);

        event(new quantityproduct($order));

        DB::commit();

        return redirect()->route('dashboard_delivery')->with('success',trans("messages_trans.success_update"));


    }
}

