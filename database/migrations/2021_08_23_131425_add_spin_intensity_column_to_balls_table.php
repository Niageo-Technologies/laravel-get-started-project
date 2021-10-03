<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSpinIntensityColumnToBallsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('balls', function (Blueprint $table) {
            $table->text('spin_intensity');
            $table->boolean('is_service')->default(false);
            $table->text('length')->nullable();
            $table->text('toss')->nullable();

        });

        Schema::dropIfExists('services');

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('balls', function (Blueprint $table) {
            //
        });
    }
}
