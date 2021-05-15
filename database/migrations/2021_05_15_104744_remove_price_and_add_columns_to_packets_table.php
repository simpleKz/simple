<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemovePriceAndAddColumnsToPacketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('packets', function (Blueprint $table) {
            $table->dropColumn('price');
            $table->string('color')->default('');
            $table->unsignedInteger('expiration_month')->default(0);
            $table->foreignId('course_id')
                ->references('id')
                ->on('courses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('packets', function (Blueprint $table) {
            $table->double('price');
            $table->dropColumn('color');
            $table->dropColumn('expiration_month');
            $table->dropForeign(['course_id']);
            $table->dropColumn('course_id');
        });
    }

}
