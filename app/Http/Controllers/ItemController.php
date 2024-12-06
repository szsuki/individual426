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
    $this->data['items'] = $items;

    // 登録件数を取得
    $totalItems = Item::count();

    // ビューにデータを渡す
    return view('items.index', compact('items', 'totalItems'));
        
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
                'type' => 'required',
                'price' => 'required|numeric|min:0',
                'stock' => 'required|integer|min:0',
                'detail' => 'nullable|max:1000',
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
            return redirect()->route('items.index')->with('success', '商品が登録されました');
        }
        // GETリクエストの場合、商品登録フォームを表示
        return view('items.add');
    }
    public function show($id)
    {
        $item = Item::findOrFail($id);  // アイテムをIDで取得
        return view('items.add', compact('item'));
    }
    //商品編集
    public function edit($id)
    {
    // 商品をIDで検索し取得
    $item = Item::findOrFail($id); // 該当する商品がない場合は404エラーを返す

    // 編集画面を表示し、商品データを渡す
    return view('items.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
    // バリデーション
    $validated = $request->validate([
        'name' => 'required|string|max:100',
        'type' => 'required|integer',
        'detail' => 'required|string|max:500',
        'price' => 'required|integer|min:0',
        'stock' => 'required|integer|min:0',

    ], [
        'name.required' => '商品名を入力してください。',
        'name.max' => '商品名は100文字以内で入力してください。',
        'type.required' => '商品種別を選択してください。',
        'type.in' => '選択された商品種別は無効です。',
        'price.required' => '価格を入力してください。',
        'price.numeric' => '価格は数値で入力してください。',
        'price.min' => '価格は0以上の値を入力してください。',
        'stock.required' => '在庫数を入力してください。',
        'stock.integer' => '在庫数は整数で入力してください。',
        'stock.min' => '在庫数は0以上の値を入力してください。',
        'detail.required' => '詳細を入力してください。',
        'detail.max' => '詳細は500文字以内で入力してください。',
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
        // 商品を削除
        $item->delete();

        // 削除後、商品一覧画面にリダイレクト
        return redirect()->route('items.index')->with('success', '商品が削除されました！');
    }



    public function store(Request $request, $id = null)  // $id パラメータを追加（新規登録と更新の両方に対応）
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',   // 商品名
            'type' => 'required|string|max:255',  // 商品タイプ
            'detail' => 'required|string|max:500', // 商品詳細
            'price' => 'required|numeric|min:0|max:1000000',  // 価格
            'stock' => 'required|integer|min:0',  // 在庫数
        ], [
            'name.required' => '商品名を入力してください。',
            'name.max' => '商品名は100文字以内で入力してください。',
            'type.required' => '商品種別を選択してください。',
            'type.in' => '選択された商品種別は無効です。',
            'price.required' => '価格を入力してください。',
            'price.numeric' => '価格は数値で入力してください。',
            'price.min' => '価格は0以上の値を入力してください。',
            'price.max' => '価格は1000000以下で入力してください。',
            'stock.required' => '在庫数を入力してください。',
            'stock.integer' => '在庫数は整数で入力してください。',
            'stock.min' => '在庫数は0以上の値を入力してください。',
            'detail.required' => '詳細を入力してください。',
            'detail.max' => '詳細は500文字以内で入力してください。',
        ]);
    
        // ログインユーザーIDまたはデフォルト値を設定
        $validated['user_id'] = auth()->id();
        //$validated['created_by'] = $validated['created_by'] ?? '';  // もし空であれば空文字に設定

        
            // 新しい商品情報を作成しデータベースに保存する
            $item = Item::create($validated);
        // 商品更新（$idが存在すれば更新、存在しなければ新規作成）
//        if ($id) {
//            // 商品をIDで取得
//            $item = Item::findOrFail($id);
            // 更新
//            $item->update($validated);
//        } else {
//            // 新規商品作成
//            $item = new Item();
//            $item->fill($validated);
//            $item->save();
//        }
    
          // 保存後、商品管理ページにリダイレクトする
          return redirect('/items')->with('success', "商品ID「{$item->id}」を登録しました。");
    }
    
    



    
/**
 * 新しい機能
 */
public function abc()
{
    return view('item.abc');
}
}


