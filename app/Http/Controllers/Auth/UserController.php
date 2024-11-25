<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller; //必要なControllerクラスをインポート
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    /**
     * コンストラクタ
     */
    public function __construct()
    {
        // ログインしているユーザーだけがアクセスできる
        $this->middleware('auth');
    }


    public function index() // ユーザー一覧画面表示
    {
        if (Gate::denies('admin')) {
            abort(403);
        }

        $users = User::all();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    // public function create()
    // {
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     */
     public function store(Request $request)
     {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'detail' => 'required|string|max:1000',
        ]);

         // user_id を設定
         $validated['user_id'] = auth()->id(); // ログイン中のユーザーIDを設定
     
         // バリデーションが通った場合の処理
         Item::create($validated);
     
         return redirect()->route('items.index')->with('success', '商品が登録されました！');
     }
    /**
     * Display the specified resource.
     */
    // public function show(string $id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user) // ユーザー編集画面表示
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user) // ユーザー情報の更新
    {
        $request->validate([
            'name' => 'required|string|max:100|regex:/^[a-zA-Z0-9ぁ-んァ-ヶ一-龠々ａ-ｚＡ-Ｚ０-９]+$/u', // 半角英数字、英語、日本語文字を許可
            'email' => 'required|email|max:255|regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/u|unique:users,email,' . $user->id, // 日本語や漢字を含まないメールアドレスに制限
            'role' => 'required|integer|in:0,1',
        ], [
            'name.required' => 'ユーザー名を入力してください。',
            'email.required' => 'メールアドレスを入力してください。',
            'email.email' => '有効なメールアドレス形式で入力してください。',
            'email.unique' => '先ほど入力されたメールアドレスはすでに使用されています。',
            'name.regex' => 'ユーザー名は文字、半角英数字、全角英数字のみ使用してください。',
            'email.regex' => 'メールアドレスにはひらがなや漢字を含めることはできません。',
        ]);


            $user->name =
        $request->input('name');
            $user->email =
        $request->input('email');
            $user->role =
        $request->input('role');
            $user->updated_at = now(); // 更新日時を現在日時に設定
            $user->save();

        return redirect()->route('users.index')->with('success', 'ユーザー情報を更新しました');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user) // ユーザー情報の削除
    {
        $user->delete();

        return redirect()->route('users.index')->with('success', 'ユーザーを削除しました');
    }
}