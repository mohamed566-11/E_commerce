<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class usercontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['route'] = 'users';
        $data['users'] = User::where('is_admin','=',0)->get();
        return view('dashboard.users.showusers',$data);
    }
    public function admins()
    {
        $data['route'] = 'admins';
        $data['admins'] = User::where('is_admin','=',1)->get();
        return view('dashboard.admins.showadmins',$data);
    }
    public function deliveries()
    {
        $data['route'] = 'deliveries';
        $data['deliveries'] = User::where('is_admin','=',2)->get();
        return view('dashboard.deliveries.showdeliveries',$data);
    }


    public function adminscreate()
    {
        $data['route'] = 'admins';
        return view('dashboard.admins.createadmins',$data);
    }
    public function adminsedit($id)
    {
        $data['route'] = 'admins';
        $admin = User::where('id',$id)->first();
        return view('dashboard.admins.editadmins',$data,compact('admin'));
    }
    public function deliveriesedit($id)
    {
        $data['route'] = 'deliveries';
        $delivery = User::where('id',$id)->first();
        return view('dashboard.deliveries.editdeliveries',$data,compact('delivery'));
    }
    public function deliveriescreate()
    {
        $data['route'] = 'deliveries';
        return view('dashboard.deliveries.createdelivery',$data);
    }
    public function adminsstore(Request $request)
    {
        $validate=$request->validate([
            'fname' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'phone' => ['nullable', 'string', 'max:11'],
            'address1' => ['nullable', 'string', 'max:255'],
            'country' => ['nullable', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        User::create([
            'fname' => $request->fname,
            'lname' => $request->lname,
            'phone' => $request->phone,
            'address1' => $request->address1,
            'country' => $request->country,
            'email' => $request->email,
            'is_admin'=>1,
            'password' => Hash::make($request->password),

        ]);
        flash()->success(trans("messages_trans.success_save"), 'Congrats', ['timeOut' => 5000]);
        return redirect()->route('admins');
    }
    public function adminsupdate(Request $request,$id)
    {
        $validate=$request->validate([
            'fname' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'phone' => ['nullable', 'string', 'max:11'],
            'address1' => ['nullable', 'string', 'max:255'],
            'country' => ['nullable', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255',
            Rule::unique('users')->ignore($id),],
            'password' => ['required', 'string', 'min:8'],
        ]);

        $user = User::findOrFail($id);
        $user->update([
            'fname' => $request->fname,
            'lname' => $request->lname,
            'phone' => $request->phone,
            'address1' => $request->address1,
            'country' => $request->country,
            'email' => $request->email,
            'is_admin'=>1,
            'password' => Hash::make($request->password),

        ]);
        flash()->success(trans("messages_trans.success_save"), 'Congrats', ['timeOut' => 5000]);
        return redirect()->route('admins');
    }
    public function deliveriesupdate(Request $request,$id)
    {
        $validate=$request->validate([
            'fname' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'phone' => ['nullable', 'string', 'max:11'],
            'address1' => ['nullable', 'string', 'max:255'],
            'country' => ['nullable', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255',
            Rule::unique('users')->ignore($id),],
            'password' => ['required', 'string', 'min:8'],
        ]);

        $user = User::findOrFail($id);
        $user->update([
            'fname' => $request->fname,
            'lname' => $request->lname,
            'phone' => $request->phone,
            'address1' => $request->address1,
            'country' => $request->country,
            'email' => $request->email,
            'is_admin'=>2,
            'password' => Hash::make($request->password),

        ]);
        flash()->success(trans("messages_trans.success_save"), 'Congrats', ['timeOut' => 5000]);
        return redirect()->route('deliveries');
    }
    public function deliverystore(Request $request)
    {
        $validate=$request->validate([
            'fname' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'phone' => ['nullable', 'string', 'max:11'],
            'address1' => ['nullable', 'string', 'max:255'],
            'country' => ['nullable', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        User::create([
            'fname' => $request->fname,
            'lname' => $request->lname,
            'phone' => $request->phone,
            'address1' => $request->address1,
            'country' => $request->country,
            'email' => $request->email,
            'is_admin'=>2,
            'password' => Hash::make($request->password),

        ]);
        flash()->success(trans("messages_trans.success_save"), 'Congrats', ['timeOut' => 5000]);
        return redirect()->route('deliveries');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data['route'] = 'users';
        $data['user'] = User::where('id',$id)->first();
        return view('dashboard.users.userdetails',$data);
    }
    public function showadmins(string $id)
    {
        $data['route'] = 'admins';
        $data['user'] = User::where('id',$id)->first();
        return view('dashboard.admins.admindetails',$data);
    }
    public function showdeliveries(string $id)
    {
        $data['route'] = 'deliveries';
        $data['user'] = User::where('id',$id)->first();
        return view('dashboard.deliveries.deliverydetails',$data);
    }
    public function deliveryOrders(string $id)
    {
        $data['route'] = 'deliveries';
        $user = User::findOrFail($id);
        $data['orders'] = $user->deliveryorders;
        return view('dashboard.deliveries.deliveryOrders',$data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['route'] = 'users';
        $user = User::where('id',$id)->first();
        return view('dashboard.users.editusers',$data,compact('user'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $validate=$request->validate([
            'fname' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'phone' => ['nullable', 'string', 'max:11'],
            'address1' => ['nullable', 'string', 'max:255'],
            'country' => ['nullable', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255',
            Rule::unique('users')->ignore($id),],
            'password' => ['required', 'string', 'min:8'],
        ]);

        $user = User::findOrFail($id);
        $user->update([
            'fname' => $request->fname,
            'lname' => $request->lname,
            'phone' => $request->phone,
            'address1' => $request->address1,
            'country' => $request->country,
            'email' => $request->email,
            'is_admin'=>0,
            'password' => Hash::make($request->password),

        ]);
        flash()->success(trans("messages_trans.success_save"), 'Congrats', ['timeOut' => 5000]);
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        if ($user->is_admin == 1) {
            return redirect()->route('admins')->with('success',trans("messages_trans.success_delete"));

        }elseif ($user->is_admin == 2) {
            return redirect()->route('deliveries')->with('success',trans("messages_trans.success_delete"));

        }else{

            return redirect()->route('users.index')->with('success',trans("messages_trans.success_delete"));
        }
    }
}
