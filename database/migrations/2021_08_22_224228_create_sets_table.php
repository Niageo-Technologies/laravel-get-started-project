<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sets', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('opponent_id');
            $table->date('date')->nullable();
            $table->text('Table type')->nullable();
            $table->text('Tournament')->nullable();
            $table->text('Venue')->nullable();
            $table->text('fh_rubber');
            $table->text('bh_rubber');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sets');
    }
}
