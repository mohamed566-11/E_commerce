<?php

    namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

    class AddToCartController extends Controller
    {
        public function index(){
            $data['route']='cart';
            $data['route_product']='products';
            $data['cart_products']= Cart::with('Product')->where('user_id',Auth::id())->get();
            return view('website.cart.cart',$data);
        }


        public function addToCart(Request $request){
            // return response()->json(['msg'=>'yes']);
        $product_id = $request->product_id;
        $qty = $request->qty;
        $user_id = Auth::id();

        if(Auth::check() ){

            if(Auth::user()->is_admin == 0){


            $product =Product::where( 'id',$product_id)->exists();
            if($product){

                if (Cart::where('product_id',$product_id)->where('user_id',$user_id)->exists()){
                    return response()->json(['msg'=>'product in your cart already']);

                }else{
                    Cart::create([
                        'user_id'=>$user_id,
                        'product_id'=>$product_id,
                        'qty'=>$qty
                    ]);

                    $product_name = product::findOrFail($product_id);
                    return response()->json(['msg'=>$product_name->name ." successfully added to your cart"]);
                }

            }else{
                return response()->json(['msg'=>'product not found']);
            }
        }else{
            return response()->json(['msg'=>'Adding products is for the user only']);
        }
        }else{
            return response()->json(['msg'=>'login first']);
        }
    }

    public function destroy($id){
        $cart = Cart::where(['id'=>$id,'user_id'=>Auth::id()])->first();
        $cart->delete();
        return redirect()->back()->with('success',trans("messages_trans.success_delete"));
    }

    public  function update(Request $request){
        if (Auth::check()){
            if (Cart::where('id',$request->id)->exists()){
                $cart = Cart::where('id',$request->id)->first();
                $cart->update([
                    'qty'=>$request->qty
                ]);

            }
            return response()->json(['msg'=>'cart updated']);
        }
    }
}
