<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;

class ItemController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * 商品一覧
     */
    public function index()
    {
        // 商品一覧取得
        $items = Item::all();

        return view('item.index', compact('items'));
    }

    /**
     * 商品登録
     */
    public function add(Request $request)
    {
        // POSTリクエストのとき
        if ($request->isMethod('post')) {
            // バリデーション
            $this->validate($request, [
                'name' => 'required|max:100',
            ]);

            // 商品登録
            Item::create([
                'user_id' => Auth::user()->id,
                'name' => $request->name,
                'code' => $request->code,
                'type' => $request->type,
                'detail' => $request->detail,
            ]);
            // 登録後、商品一覧にリダイレクト
            return redirect('/item');
        }
        // GETリクエストの場合、商品登録フォームを表示
        return view('item.add');
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'type' => 'required|string|max:255',
        'detail' => 'required|string|max:1000', // 他の項目も適切に追加
        'price' => 'required|numeric|min:0', // priceのバリデーションを追加
        // 必要に応じて他のフィールドもここにバリデーションを設定
    
    ]);

    // user_id を明示的に追加
    $validated['user_id'] = auth()->id();

    // バリデーションが通った場合の処理
    Item::create($validated);

    return redirect()->route('items.index')->with('success', '商品が登録されました！');
}



    
/**
 * 新しい機能
 */
public function abc()
{
    return view('item.abc');
}
}


