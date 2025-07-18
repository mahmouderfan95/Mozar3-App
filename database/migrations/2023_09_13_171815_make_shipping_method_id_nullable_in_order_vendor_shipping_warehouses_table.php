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
        Schema::table('order_vendor_shipping_warehouses', function (Blueprint $table) {
            $table->unsignedBigInteger('shipping_method_id')->nullable()->change();
        });
    }
};
