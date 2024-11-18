<?php

namespace App\Http\Controllers;

use App\Models\contact;
use Illuminate\Http\Request;

class admincontactcontroller extends Controller
{
    public function index()
    {
        $data['route']="contact";
        $data['contacts']=contact::with('user')->get();
        return view('dashboard.contact.index',$data);
    }
    public function update(Request $request, string $id)
    {
        $contact = contact::findOrFail($id);

        $contact->update([
            'status'=>$request->status,
        ]);

        // dd($user);
        return redirect()->route('contact.index')->with('success',trans("messages_trans.success_update"));

    }


    public function destroy(string $id)
    {
        $contact = contact::findOrFail($id);
        $contact->delete();
        return redirect()->route('contact.index')->with('success',trans("messages_trans.success_delete"));
    }
}
