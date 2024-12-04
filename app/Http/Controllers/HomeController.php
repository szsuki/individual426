<?php

namespace App\Http\Controllers;
use App\Models\Item; // モデルをインポート
use Illuminate\Http\Request;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
    // 新着商品を取得（最新5件）
    $Items = Item::orderBy('created_at', 'desc')->take(5)->get();
    $types=[
        1 => "文芸",
        2 => "絵本",
        3 => "漫画",
        4 => "雑誌",
        5 => "その他"
        
    ];
    return view('home',compact('items','types'));
    }
}
