<?php
namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route; // Routeクラスのインポート
use Illuminate\Support\Facades\Auth;  // Authクラスのインポート
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\DashboardController; // 必要なコントローラーをインポート
use App\Http\Controllers\Auth\RegisterController; // アカウント登録
use App\Http\Controllers\SearchController; // 商品検索
use App\Http\Controllers\Auth\UserController; // 
use App\Http\Controllers\Auth\ForgotPasswordController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// トップページ
Route::get('/', [HomeController::class, 'index'])->name('home')->middleware('auth');

// 認証ルート
Auth::routes(); // 認証に必要なルートを自動で読み込む


// 商品関連のルート

Route::prefix('items')->group(function () {
    Route::get('/', [ItemController::class, 'index'])->name('items.index'); //index.php
    Route::get('/add', [ItemController::class, 'add'])->name('items.add'); //add.php
    Route::post('/add', [ItemController::class, 'store'])->name('items.store');
});



// アカウント関連のルート

// 会員登録処理
Route::post('/account/store', [AccountController::class, 'store'])->name('account.store'); // アカウント作成処理

// 登録フォームの表示
Route::get('/auth/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
// 登録処理
Route::post('/auth/register', [RegisterController::class, 'register']);


//パスワード
Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

// home ダッシュボード
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');


// アクセス制御（管理者ユーザーのみ）
Route::group(['middleware' => 'can:admin'], function() {
    // ユーザー情報一覧表示
    Route::get('/users',[\App\Http\Controllers\Auth\UserController::class, 'index'])->name('users.index');
    // ユーザー情報編集画面表示
    Route::get('/users/{user}/edit',[\App\Http\Controllers\Auth\UserController::class, 'edit'])->name('users.edit');
    // ユーザー情報編集処理
    Route::put('/users/{user}',[\App\Http\Controllers\Auth\UserController::class, 'update'])->name('users.update');
    // ユーザー情報削除
    Route::delete('/users/{user}',[\App\Http\Controllers\Auth\UserController::class, 'destroy'])->name('users.destroy');
});

// 共有ルート(管理者・ユーザー)

    // ホーム画面表示
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);

    // マイページ表示
    Route::get('/account/profile/{id}', [App\Http\Controllers\AccountController::class,'profile'])->name('profile');
    // マイページ編集画面表示
    Route::get('/account/profile/edit/{page}', [App\Http\Controllers\AccountController::class,'edit'])->name('profileEdit');
    // マイページ編集
    Route::patch('/account/profile/update/{page}', [App\Http\Controllers\AccountController::class,'update'])->name('profileUpdate');


    // 商品一覧ページ
    Route::get('/search/list', [SearchController::class, 'list'])->name('search.list');
    // 商品詳細ページ
    Route::get('/search/{id}', [SearchController::class, 'show'])->name('search.show');
