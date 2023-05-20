<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ColunDispo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { Schema::table('VoitureS', function (Blueprint $table) {
        $table->boolean('disponible')->default(true);
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
            $table->dropColumn('disponibe');
            });
    }
}
