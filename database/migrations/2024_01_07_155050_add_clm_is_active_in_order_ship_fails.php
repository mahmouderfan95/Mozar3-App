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
        Schema::table('order_ship_fails', function (Blueprint $table) {
            $table->BigInteger('orderVendorShipping_id')->unsigned()->nullable()->after('order_id');
            $table->tinyInteger('is_active')->default(1)->after('res');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('order_ship_fails', function (Blueprint $table) {
            //
        });
    }
};
