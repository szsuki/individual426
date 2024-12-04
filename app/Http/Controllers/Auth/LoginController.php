<?php

namespace App\Http\Controllers\Auth;
/*ログイン機能
*/
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function login(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required|min:6',
    ]);

    if (Auth::attempt($request->only('email', 'password'), $request->filled('remember'))) {
        return redirect()->intended('dashboard'); // ログイン成功時のリダイレクト先
    }

    // ログイン失敗時のエラーメッセージ
    return back()->withErrors([
        'email' => 'メールアドレスまたはパスワードが間違っています。',
    ])->onlyInput('email');
}
}
