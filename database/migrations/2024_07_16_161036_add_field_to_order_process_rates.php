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
        Schema::table('order_process_rates', function (Blueprint $table) {
            $table->foreignId('order_service_id')->nullable()->constrained('order_services')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('order_process_rates', function (Blueprint $table) {
            $table->dropColumn('order_service_id');
        });
    }
};
