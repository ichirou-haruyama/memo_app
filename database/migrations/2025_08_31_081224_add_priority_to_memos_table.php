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
        Schema::table('memos', function (Blueprint $table) {
        $table->integer('priority')->default(1)->comment('優先度: 1=低, 2=中, 3=高');
            //
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('memos', function (Blueprint $table) {
        $table->dropColumn('priority');
            //
        });
    }
};
