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

    // 商品一覧をページネーション付きで取得
    $items = Item::paginate(10);

    // 登録件数を取得
    $totalItems = Item::count();

    // ビューにデータを渡す
    return view('item.index', compact('items', 'totalItems'));
        
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
                'type' => $request->type,
                'price' => $request->price,
                'stock' => $request->stock,
                'detail' => $request->detail,
            ]);
            // 登録後、商品一覧にリダイレクト
            return redirect('/item');
        }
        // GETリクエストの場合、商品登録フォームを表示
        return view('item.add');
    }

    //商品編集
    public function edit($id)
    {
    // 商品をIDで検索し取得
    $item = Item::findOrFail($id); // 該当する商品がない場合は404エラーを返す

    // 編集画面を表示し、商品データを渡す
    return view('item.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
    // バリデーション
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'type' => 'required|integer',
        'detail' => 'nullable|string|max:1000',
        'price' => 'required|numeric|min:0',
    ]);

    // 商品をIDで検索し取得
    $item = Item::findOrFail($id);

    // 商品データを更新
    $item->update($validated);

    // 更新後、商品一覧画面にリダイレクト
    return redirect()->route('items.index')->with('success', '商品が更新されました！');
    }


        public function destroy($id)
    {
        // 商品をIDで検索し、削除
        $item = Item::findOrFail($id);
        $item->delete();

        // 削除後、商品一覧画面にリダイレクト
        return redirect()->route('items.index')->with('success', '商品が削除されました！');
    }



    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'detail' => 'required|string|max:1000',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);
    
        // ログインユーザーIDまたはデフォルト値を設定
        $validated['user_id'] = auth()->id();
        $validated['created_by'] = auth()->id() ?? 0;
    
        // デバッグ用: 挿入データ確認
        // dd($validated);
    
        // データベースに保存
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


