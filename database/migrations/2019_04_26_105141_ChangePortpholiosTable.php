<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangePortpholiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('portpholios', function (Blueprint $table) {
            $table->string('filter_alias');
            $table->foreign('filter_alias')->references('alias')->on('pfilters');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('portpholios', function (Blueprint $table) {
            //
        });
    }
}
