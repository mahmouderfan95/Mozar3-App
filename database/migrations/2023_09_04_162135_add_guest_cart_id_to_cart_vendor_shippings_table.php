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
        Schema::table('cart_vendor_shippings', function (Blueprint $table) {
            $table->unsignedBigInteger('guest_cart_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cart_vendor_shippings', function (Blueprint $table) {
            $table->dropColumn('guest_cart_id');
        });
    }
};
