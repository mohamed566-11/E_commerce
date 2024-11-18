<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsAdminMiddelware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // if(Auth::check()){
        //     if(Auth::user()->is_admin==1){
        //         return $next($request);
        //     }
        //     // elseif(Auth::user()->is_admin==0){
        //     //     return redirect('/')->with('success','login Successfully');
        //     // }
        //     else{
        //         abort(403);
        //     }
        // }else{
        //     return redirect()->back()->with('status','you should login');
        // }


    if (Auth::check()) {
        if (Auth::user()->is_admin == 1) {
            // السماح للإدمن بالمرور إلى الداشبورد
            return $next($request);
        } else {
            // توجيه المستخدم العادي إلى الصفحة الرئيسية
            return redirect()->route('home')->with('success', 'Login Successfully');
        }
    } else {
        // توجيه المستخدم غير المسجل إلى الصفحة السابقة مع رسالة خطأ
        return redirect()->back()->with('status', 'You should login');
    }


    }
}
