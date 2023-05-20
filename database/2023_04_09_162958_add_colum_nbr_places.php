<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumNbrPlaces extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { Schema::table('Voitures', function (Blueprint $table) {
        $table->integer('nbp')->default(5);
    });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('VoitureS', function (Blueprint $table) {
            $table->dropColumn('nbp');
            });
    }
}
