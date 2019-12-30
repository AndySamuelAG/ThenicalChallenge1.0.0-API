<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Personas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Personas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tipo', 10);
            $table->string('nombre', 30);
            $table->string('apellido', 30);
            $table->string('correo', 100);
            $table->integer('telefono');
            $table->integer('libros')->default(0);
            $table->double('adeudo', 4, 2)->default(0);
            $table->integer('numPersona');
            $table->integer('prestamoId');
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
