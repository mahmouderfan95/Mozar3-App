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
        Schema::table('qnas', function (Blueprint $table) {
            $table->foreignId('faq_category_id')->nullable()->constrained('faq_categories')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('qnas', function (Blueprint $table) {
            $table->dropColumn('faq_category_id');
        });
    }
};
