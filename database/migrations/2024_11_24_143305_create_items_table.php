<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();  // 商品ID (自動採番)
            $table->unsignedBigInteger('user_id')->nullable(); // 修正: `change()` を削除
            $table->string('name', 100)->index();  // 商品名
            $table->tinyinteger('type');
            $table->decimal('price', 10, 2)->default(0)->change();  // 価格 (小数点2桁まで)
            $table->integer('stock');  // 在庫数
            $table->string('detail', 500)->nullable();
            $table->string('created_by',10);  // 登録者
            $table->timestamps();  // 登録日時、更新日時

            // 外部キー制約
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
};
