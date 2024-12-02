<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\User;
use \Illuminate\Support\Facades\Auth;
use Gate;
use Illuminate\Validation\Rule;
use \Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;



class AccountController extends Controller
{
    // //会員登録画面表示
    public function register() 
    {
        return view('account.register');
    }

    //会員登録処理
    public function store(Request $request) 
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100|alpha_num',
            'email' => 'required|email:rfc,filter|regex:/^[!-~]+$/|unique:users,email',
            'password' => 'required|string|min:6|confirmed|regex:/\A(?=.*?[a-z])(?=.*?\d)(?=.*?[!-\/:-@[-`{-~])[!-~]+\z/i'
        ],
        [
            'name.required' => '名前は必須です。',
            'name.max' => '名前は100文字以下で入力してください。',
            'name.alpha_num' => '記号は使用できません。',
            'email.required' => 'メールアドレスは必須です。',
            'email' => '有効なメールアドレスではありません。',
            'email.unique' => 'このメールアドレスはすでに使用されています。',
            'password.required' => 'パスワードは必須です。',
            'password.min' => 'パスワードは6字以上255字以下で入力してください。',
            'password.confirmed' => 'パスワードが一致しません。',
            'password.regex' => 'パスワードは、英字・数字・記号それぞれ少なくとも1文字を含んでいる必要があります。',
        ]);
        $user = User::create($validated);

        return redirect()->route('login')->with('successMessage','登録完了しました。ログインしてください。');
    }

    //ログイン画面表示
    public function login() {
        return view('auth.passwords.login');
    }

    /**
     * 認証の試行を処理
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ],
        [
            'email.required' => 'メールアドレスは必須です。',
            'email' => '有効なメールアドレスではありません。',
            'password.required' => 'パスワードは必須です。',
            'password.min' => 'パスワードは6字以上255字以下で入力してください。',
        ]);
        if(Auth::attempt($credentials))
        {
            $request->session()->regenerate();
            return redirect()->intended('/home')->with('successMessage','ログイン成功！');
        }
        return redirect()->route('login')->with('alertMessage','メールアドレス、またはパスワードが違います。再度確認して入力してください。');
    }

    /**
     * ユーザーをアプリケーションからログアウトさせる
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('successMessage','ログアウトしました。');
    }

    // プロフィール表示
    public function profile() {
        $auth = Auth::user();
        return view('account.profile', compact('auth'));
    }
    // プロフィール編集画面表示
    public function edit(Request $request,$page) {
        $auth = Auth::user();
        $page = $request->page;
        return view('account.edit',compact('auth'));
    }
// プロフィール編集処理
public function update(Request $request, User $user) {
    $user = Auth::user();
    
    //バリデーションチェック
    $validated = $request->validate([
        'name' => 'required|string|max:100|alpha_num',
        'email' => 'required|email:rfc,filter|regex:/^[!-~]+$/|unique:users,email,'.Auth::user()->email.',email',
        'password' => ['nullable','min:6','confirmed','regex:/\A(?=.*?[a-z])(?=.*?\d)(?=.*?[!-\/:-@[-`{-~])[!-~]+\z/i']
    ], 
    [
        'name.required' => '名前は必須です。',
        'name.max' => '名前は100文字以下で入力してください。',
        'name.alpha_num' => '記号は使用できません。',
        'email.required' => 'メールアドレスは必須です。',
        'email' => '有効なメールアドレスではありません。',
        'email.unique' => 'このメールアドレスはすでに使用されています。',
        'password.min' => 'パスワードは6字以上255字以下で入力してください。',
        'password.confirmed' => '入力したパスワードがパスワード（確認）と一致しません。',
        'password.regex' => '半角英数字記号それぞれ一文字以上使用してください',
    ]);
    // パスワードの値に入力があれば
    if ($validated['password']) {
        // 現在のパスワードが合っているか確認
        if(!(Hash::check($request->get('current_password'), Auth::user()->password))) {
            return back()->with('alertMessage','現在のパスワードが間違っています。');
        }
        $validated['password'] = Hash::make($validated['password']);
    } else {
        // 値が無ければパラメータに含めない
        unset($validated['password']);
    }
    
    // アップデート
    $user->update($validated);
    $request->session()->flash('successMessage','更新しました。');
    return redirect()->route('profile', ['id' => auth()->user()->id]);
}
}