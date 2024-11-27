<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // カラムが存在しない場合にのみ追加
        if (!Schema::hasColumn('items', 'price')) {
            Schema::table('items', function (Blueprint $table) {
                $table->decimal('price', 10, 2)->nullable(false)->default(0);
            });
        }
    }

    public function down(): void
    {
        // カラムを削除
        Schema::table('items', function (Blueprint $table) {
            $table->dropColumn('price');
        });
    }
};
