<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePacketPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packet_prices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('packet_id')
                ->references('id')->on('packets');
            $table->string('currency');
            $table->unsignedDouble('price');
            $table->unsignedDouble('old_price')
                ->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('packet_prices');
    }
}
