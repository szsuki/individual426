<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('items', function (Blueprint $table) {
        $table->unsignedBigInteger('created_by')->default(0)->change();
    });
}

public function down()
{
    Schema::table('items', function (Blueprint $table) {
        $table->unsignedBigInteger('created_by')->nullable(false)->change();
    });
}
};
