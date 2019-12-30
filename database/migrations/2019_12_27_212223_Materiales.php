<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Materiales extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Materiales', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tipo', 10);
            $table->string('codigo', 20);
            $table->string('autor', 100);
            $table->string('titulo', 100);
            $table->integer('anio');
            $table->string('status', 15);
            $table->double('precio', 4, 2);
            $table->string('editorial', 100);
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
