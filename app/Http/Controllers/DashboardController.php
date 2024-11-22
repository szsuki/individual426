<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class DashboardController extends Controller
{
    // ダッシュボードページを表示する
    public function index()
    {
        return view('dashboard'); // 'dashboard' ビューを返す
    }
}