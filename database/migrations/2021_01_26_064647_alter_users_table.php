<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('first_name')->nullable(true);
            $table->string('last_name')->nullable(true);
            $table->string('phone')->unique()->nullable(true);
//            $table->string('email')->nullable(true)->change();
            $table->longText('image_path');
            $table->longText('ref_link')->nullable(true);
            $table->unsignedBigInteger('role_id');
            $table->unsignedBigInteger('withdrawal_card_id')->nullable(true);
            $table->unsignedBigInteger('ref_user_id')->nullable(true);
            $table->foreign('role_id')->references('id')->on('roles');
            $table->foreign('withdrawal_card_id')->references('id')->on('user_cards');
            $table->foreign('ref_user_id')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['role_id']);
            $table->dropForeign(['withdrawal_card_id']);
            $table->dropForeign(['ref_user_id']);
            $table->dropColumn('role_id');
            $table->dropColumn([ 'withdrawal_card_id', 'ref_user_id', 'first_name',
                'phone', 'last_name', 'image_path', 'ref_link']);
        });
    }
}
