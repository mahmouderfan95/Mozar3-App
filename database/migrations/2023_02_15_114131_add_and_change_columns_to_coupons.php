<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('coupons', function (Blueprint $table) {
            $table->dropColumn('status');
        });
        Schema::table('coupons', function (Blueprint $table) {
            $table->enum('status' , ['pending','approved','rejected'])->default('pending');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('coupons', function (Blueprint $table) {
            $table->dropColumn('status');
        });
        Schema::table('coupons', function (Blueprint $table) {
            $table->enum('status' , ['enable','disable'])->default('disable');
        });
    }
};
