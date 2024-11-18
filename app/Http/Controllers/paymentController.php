<?php




    namespace App\Http\Controllers;

use Stripe\Stripe;
use App\Models\Cart;
use App\Models\Order_items;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
    use Stripe\Checkout\Session;

    class paymentController extends Controller
    {
        public function payment()
        {

            
            Stripe::setApiKey(env('STRIPE_SECRET'));
            DB::beginTransaction();
            $items = Cart::where('user_id', Auth::user()->id)->get();

            $line_items = []; // مصفوفة لتخزين المنتجات بشكل صحيح

            // تكرار العناصر في السلة وإنشاء line_items لStripe
            foreach ($items as $cart_item) {
                $line_items[] = [
                    'price_data' => [
                        'currency' => 'EGP',
                        'product_data' => [
                            'name' => $cart_item->product->name,
                        ],
                        'unit_amount' => $cart_item->product->selling_price * 100,
                    ],
                    'quantity' => $cart_item->qty,
                ];
            }


            $checkout_session = Session::create([
                'payment_method_types' => ['card'],
                'line_items' => $line_items,
                'mode' => 'payment',
                'success_url' => route('payment.success'),
                'cancel_url' => route('payment.cancel'),
            ]);
            DB::commit();

            // Cart::where('user_id', Auth::id())->delete();
            // إعادة توجيه المستخدم إلى صفحة الدفع في Stripe
            return redirect($checkout_session->url);
        }

        public function success()
        {


            $order = Auth::user()->orders->last();
            $order->update([
                'payment_status'=>'paid'
            ]);

            Cart::where('user_id', Auth::id())->delete();

            return redirect()->route('home')->with('success', 'تم الدفع بنجاح، وتم إفراغ السلة.');
        }

        public function cancel()
        {
            $order = Auth::user()->orders->last();
            $order->update([
                'payment_status'=>'failed'
            ]);
            return redirect()->route('home')->with('error', 'حدث خطأ أثناء الدفع الطلب');

        }
    }
