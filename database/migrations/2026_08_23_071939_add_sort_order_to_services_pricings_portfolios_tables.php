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
        Schema::table('services', function (Blueprint $table) {
            $table->unsignedInteger('sort_order')->default(0)->after('id');
        });
        Schema::table('pricings', function (Blueprint $table) {
            $table->unsignedInteger('sort_order')->default(0)->after('id');
        });
        Schema::table('portfolios', function (Blueprint $table) {
            $table->unsignedInteger('sort_order')->default(0)->after('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn('sort_order');
        });
        Schema::table('pricings', function (Blueprint $table) {
            $table->dropColumn('sort_order');
        });
        Schema::table('portfolios', function (Blueprint $table) {
            $table->dropColumn('sort_order');
        });
    }
};
