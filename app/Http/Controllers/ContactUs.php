<?php

namespace App\Http\Controllers;

use App\Mail\MailContactUs;
use App\Models\contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ContactUs extends Controller
{


    public function index(){
        return view('website.contact');
    }
    public function store(Request $request)
    {
        // set_time_limit(300);
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'sub' => 'required',
            'phone' => 'required|min_digits:11|max_digits:11',
            'msg' => 'required',
        ]);

        contact::create([
            'user_id'=>Auth::user()->id,
            'name'=>$request->name,
            'email'=>$request->email,
            'sub'=>$request->sub,
            'phone'=>$request->phone,
            'msg'=>$request->msg,
        ]);

        return redirect()->back()->with('success', 'تم التواصل بنجاح انتظر الرد ');




        // dd($data);
        // Send Email
        // try {
        //     Mail::to('01113604940k@gmail.com')
        //     ->send(new MailContactUs($maildata));

        // } catch (\Throwable $th) {
        //     dd($th);

        // }

    }
}

