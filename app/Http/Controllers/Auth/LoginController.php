<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
   
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */

    public function username(){
        return 'username';
    }
    /**Sau khi login sẽ chạy đến HOME */
    protected $redirectTo = RouteServiceProvider::HOME;

    /** Đăng xuất */
    public function logout() {
        //dd(auth()->id()); xem id của user đang đăng nhập hệ thống
        // dd(auth()->user());  xem thông tin của user đang đăng nhập hệ thống
        auth()->logout();
        return redirect(RouteServiceProvider::HOME);
    }
}
/**RouteServiceProvider::HOME = "/" = ->route('homepage') */
/**RouteServiceProvider = RouteServiceProvider.php  */
/** readirect = chuyển hướng đến trang nào đó */