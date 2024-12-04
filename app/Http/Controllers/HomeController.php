<?php

namespace App\Http\Controllers;

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
    $newItems = Item::orderBy('created_at', 'desc')->take(5)->get();

    return view('home', [
        'newItems' => $newItems,
    ]);
    }
}
