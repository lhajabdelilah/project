<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Location extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('car_id');
            $table->string('client_name');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->string('type_payment'); // Ajout de la colonne type_payment
            $table->float('amount'); // Ajout de la colonne amount
            $table->timestamps();
            
            // Déclaration de la clé étrangère pour la colonne car_id
            $table->foreign('car_id')->references('id')->on('Voitures')->onDelete('cascade');
            $table->foreign('clt_id')->references('id')->on('users')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('locations');
    }
}
