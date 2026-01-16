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
    Schema::table('staff', function (Blueprint $table) {
        $table->integer('experience')->nullable()->after('role');
    });
}

public function down(): void
{
    Schema::table('staff', function (Blueprint $table) {
        $table->dropColumn('experience');
    });
}

};
