<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();  // 商品ID (自動採番)
            $table->bigInteger('user_id')->unsigned()->index();
            $table->string('name');  // 商品名
            $table->string('category');  // カテゴリ
            $table->timestamps();  // 登録日時、更新日時 (Laravelのタイムスタンプ機能)
            
             // 外部キー制約
             $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
