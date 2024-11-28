<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class SearchController extends Controller
{
    public function list(Request $request) {
        $keyword = $request->input('keyword');
        $type = $request->input('type'); 
    
        // クエリの作成
        $query = \App\Models\Item::query();
    
        if (!empty($keyword)) {
            $query->where('name', 'LIKE', "%{$keyword}%");
        }
    
        if (!empty($type)) { 
            $query->where('type', $type); //'type'が指定されている場合のみ絞り込み
        }

        // 並び替えの条件
        //$sortField = $request->input('sort', 'id'); // 並び替えフィールド
        //$sortOrder = $request->input('order', 'asc'); // 並び替えの順序

        
         // 並び替え,ページネーション,条件の維持
        $items = $query //->orderBy($sortField, $sortOrder)
                        ->paginate(10)
                        ->appends($request->only(['sort', 'order', 'keyword', 'type'])); // 並び替えを保持

        // 件数を取得
        $itemCount = $query->count();

        // ビューにデータを渡す
        return view('search.list', compact('items', 'keyword', 'type', 'itemCount'));
    }

    // 商品詳細の表示
    public function show($id) {
        // IDに基づいて商品を取得
        $item = Item::findOrFail($id);

        // データを詳細ビューへ渡す
        return view('search.show.show', compact('item'));
    }
}
