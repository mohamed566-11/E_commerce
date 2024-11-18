<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Order_items;
use Illuminate\Http\Request;
use App\Models\Order_addresess;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class notificationorderscontroller extends Controller
{
    public function orderdetailsfornotification($id)
    {



        $data['route']="orders";

        $data['orderdetails']=Order_items::where('order_id',$id)->get();
        $data['orderadresess']=Order_addresess::where('order_id',$id)->first();
        $get_ids = DB::table('notifications')->where('data->order_id',$id)->pluck('id');
        DB::table('notifications')->whereIn('id', $get_ids)->update(['read_at' => now()]);
        return view('dashboard.orders.orderdetails',$data);
    }

    public function markallnotify(){
        foreach (Auth::user()->unreadNotifications as $notification) {
            // $notification->markAsRead();
            $notification->delete();
        }
        return redirect()->back();
    }
}
