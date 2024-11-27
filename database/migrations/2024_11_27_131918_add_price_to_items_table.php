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
    Schema::table('items', function (Blueprint $table) {
        $table->decimal('price', 10, 2)->default(0)->nullable(); // 価格フィールドの追加
    });
}

public function down()
{
    Schema::table('items', function (Blueprint $table) {
        $table->dropColumn('price'); // 価格フィールドを削除する
    });
}

};
