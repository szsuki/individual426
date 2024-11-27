<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DebugController extends Controller
{
    public function checkCustomGuard()
    {
        // custom_guard ガードの状態を確認
        if (Auth::guard('custom_guard')->check()) {
            dd('ログイン中: ' . Auth::guard('custom_guard')->user());
        } else {
            dd('ログインしていません');
        }
    }
}
