<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableVoitures extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Voitures', function (Blueprint $table) {
            $table->string('id',30)->unique();
            $table->string('CNI',30);
            $table->string('Marque',50);
            $table->string('Model',50);
            $table->string('Couleur',70);
            $table->string('Puissance',50);
            $table->string('Categorie',70);
            $table->string('Cous_par_jour',70);
            $table->string('Image',300);
          
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
        Schema::dropIfExists('Voitures');
    }
}
