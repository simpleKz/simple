<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->string('currency');
            $table->foreignId('packet_price_id')
                ->references('id')->on('packet_prices');
            $table->dropForeign(['course_id']);
            $table->dropColumn('course_id');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn('currency');
            $table->dropForeign('packet_price_id');
            $table->dropColumn('packet_price_id');
            $table->foreignId('course_id')
                ->references('id')->on('courses');

        });
    }
}
