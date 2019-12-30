<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Prestamos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Prestamos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('personaId');
            $table->integer('prestamoId');
            $table->integer('materialId');
            $table->double('valor');
            $table->dateTime('fechaSalida')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->dateTime('fechaRegreso');
            $table->boolean('entregado')->default(false);
            $table->integer('biblioteca');
            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
